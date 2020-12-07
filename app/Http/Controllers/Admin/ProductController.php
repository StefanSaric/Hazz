<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product_Categories;
use App\Product_Tags;
use App\Products;
use App\Materials;
use App\Categories;
use App\Tags;
use App\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {

        $products = Products::with('materials', 'categories', 'tags', 'sizes')->where('show', '=', 1)->get();

        return view('admin.products.allproducts', ['active' => 'allProducts', 'products' => $products]);

    }

    public function create()
    {
        $products = Products::all();
        $categories = Categories::all();
        $tags = Tags::all();
        $sizes = Sizes::all();

        return view('admin.products.create', ['active' => 'addProduct', 'products' => $products, 'categories' => $categories, 'tags' => $tags, 'sizes' => $sizes]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photos' => 'required','tags' => 'required','category' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $now = time();
        $product = Products::create($request->except('photos'));

        $categories = $request->get('category');
        if ($categories != null) {
            $lines1 = explode(',', $categories);
            foreach ($lines1 as $l) {
                $category = Categories::where('name', $l)->first();
                if ($category == null) {
                    $category = Categories::create([
                        'name' => $l
                    ]);
                }
                $product->categories()->attach($category->id);
            }
        }

        $tags = $request->get('tags');
        if ($tags != null) {
            $lines = explode(',', $tags);
            foreach ($lines as $line) {
                $tag = Tags::where('name', $line)->first();
                if ($tag == null) {
                    $tag = Tags::create([
                        'name' => $line
                    ]);
                }
                $product->tags()->attach($tag->id);
            }
        }

        foreach ($request->get('sizes') as $one_size)
        $size = Sizes::create(['product_id' => $product->id,
            'quantity' =>$one_size['quantity'],
            'unit' => $one_size['unit'],
            'stock' => $one_size['stock'],
            'price' => $one_size['price'],
            'old_price' => $one_size['old_price']
        ]);

        $photo_id = 0;
        $path = 'images/products/' . $product->id;
        if ($request->file('photos') != null) {
            foreach ($request->file('photos') as $photo) {
                $photo_id++;
                $image_path = public_path($path) . '/slika_' . $photo_id . $now . '.' . $photo->getClientOriginalExtension();
                if (!is_dir(dirname($image_path))) {
                    mkdir(dirname($image_path), 0777, true);
                }
                Image::make($photo->getRealPath())->save(public_path($path) . '/slika_' . $photo_id . $now . '.' . $photo->getClientOriginalExtension());
                $url = $path . '/slika_' . $photo_id . $now . '.' . $photo->getClientOriginalExtension();
                $image = Materials::create(['product_id' => $product->id, 'url' => $url]);
            }
        }

        return redirect('admin/products');
    }

    public function edit($id)
    {

        $product = Products::find($id);
        $categories = Categories::all();
        $tags = Tags::all();
        $sizes = Sizes::all();

        return view('admin.products.edit', ['active' => 'addProduct', 'product' => $product, 'categories' => $categories, 'tags' => $tags, 'sizes' => $sizes]);

    }

    public function update(Request $request, $id)
    {

        $product = Products::find($id);
        $removeArray = $request->get('removematerials');
        $removes = json_decode($removeArray);
        $removeSize = $request->get('removesize');
        $size_removes = json_decode($removeSize);
        //dd($removeSize);

        if (sizeof($removes) == $product->materials->count()){
            $validator = Validator::make($request->all(), [
                'photos' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
        }

        $validator = Validator::make($request->all(), [
            'tags' => 'required','category' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $now = time();
        $product->update($request->except('photos'));
        $photo_id = 0;
        $path = 'images/products/' . $product->id;
        if ($request->file('photos') != null) {
            foreach ($request->file('photos') as $photo) {
                $photo_id++;
                $image_path = public_path($path) . '/slika_' . $photo_id . $now . '.' . $photo->getClientOriginalExtension();
                if (!is_dir(dirname($image_path))) {
                    mkdir(dirname($image_path), 0777, true);
                }
                Image::make($photo->getRealPath())->save(public_path($path) . '/slika_' . $photo_id . $now . '.' . $photo->getClientOriginalExtension());
                $url = $path . '/slika_' . $photo_id . $now . '.' . $photo->getClientOriginalExtension();
                $image = Materials::create(['product_id' => $product->id, 'url' => $url]);
            }
        }

        //editovanje sizova
        $sizes= $request->get('sizes');
        //dd($sizes);
        foreach ($sizes as $one_size) {
            $sizeExist = Sizes::where('product_id', $product->id)
                ->where('quantity', $one_size["quantity"])
                ->where('unit', $one_size["unit"])
                ->where('stock', $one_size["stock"])
                ->where('price', $one_size["price"])
                ->where('old_price', $one_size["old_price"])
                ->first();
            if (!isset($one_size['id'])) {
                //dd(!isset($one_size['id']));
                    $size = Sizes::create([
                        'product_id' => $product->id,
                        'quantity' => $one_size['quantity'],
                        'unit' => $one_size['unit'],
                        'stock' => $one_size['stock'],
                        'price' => $one_size['price'],
                        'old_price' => $one_size['old_price']
                    ]);
                }
            else if ($sizeExist == null ){
            $size = Sizes::find($one_size['id']);
            $size->quantity = $one_size["quantity"];
            $size->unit = $one_size["unit"];
            $size->stock = $one_size["stock"];
            $size->price = $one_size["price"];
            $size->old_price = $one_size["old_price"];
            $size->save();
            }
        }
        if (sizeof($size_removes) > 0) {
            foreach ($size_removes as $one_remove) {
                $size = Sizes::where('id', $one_remove)->first();
                if ($size != null) {
                    //$remove je id tog materijala
                    Sizes::where('id', $one_remove)->delete();
                }
            }
        }


        //editovanje tagova
        $tags= $request->get('tags');
        if ($tags != null) {
            $lines = explode(',', $tags);
            foreach ($lines as $line) {
                $tagExist = Tags::join('product_tags', 'product_tags.tag_id', 'tags.id')
                    ->where('product_tags.product_id', $product->id)
                    ->where('tags.name', $line)
                    ->first();
                if ($tagExist == null) {
                    if (Tags::where('name', $line)->count() == 0) {
                        $tag = Tags::create([
                            'name' => $line
                        ]);
                        $product->tags()->attach($tag->id);
                    } elseif (Tags::where('name', $line)->count() > 0)
                        $product->tags()->attach(Tags::where('name', $line)->get('id'));
                }
            }
            foreach ($product->tags as $tag) {
                if (!in_array($tag->name, $lines))
                    Product_Tags::where('tag_id', $tag->id)->where('product_id', $product->id)->delete();
            }
        }


        //editovanje kategorija
        $categories = $request->get('category');
        if ($categories != null) {
            $lines = explode(',', $categories);
            foreach ($lines as $line) {
                $categoryExist = Categories::join('product_categories', 'product_categories.category_id', 'categories.id')
                    ->where('product_categories.product_id', $product->id)
                    ->where('categories.name', $line)
                    ->first();
                if ($categoryExist == null) {
                    if (Categories::where('name', $line)->count() == 0) {
                        $category = Categories::create([
                            'name' => $line
                        ]);
                        $product->categories()->attach($category->id);
                    } elseif (Categories::where('name', $line)->count() > 0)
                        $product->categories()->attach(Categories::where('name', $line)->get('id'));
                }
            }
            foreach ($product->categories as $category) {
                if (!in_array($category->name, $lines))
                    Product_Categories::where('category_id', $category->id)->where('product_id', $product->id)->delete();
            }
        }

        //brisanje slike
        if (sizeof($removes) > 0) {
            foreach ($removes as $remove) {
                $material = Materials::where('id', $remove)->first();
                if ($material != null) {
                    //$remove je id tog materijala
                    Materials::where('id', $remove)->delete();
                }
            }
        }

        //sortiranje slike
        $sortImages = $request->get('sortImages');
        if ($sortImages != null) {
            $sortImagesJson = json_decode($sortImages);
            if (sizeof($sortImagesJson) > 0) {
                foreach ($sortImagesJson as $num => $img) {
                    $num++;
                    $material = Materials::where('id', $img)->first();
                    if ($material != null) {
                        //$remove je id tog materijala
                        $material->update([
                            'ordernumber' => $num
                        ]);
                    }
                }
            }
        }

        return redirect('admin/products');
    }

    public function  delete($id)
    {
        $product = Products::find($id);
        $product->show = 0;
        $product->save();

        return redirect('admin/products');
    }

    public function page($id){

        $size = Sizes::find($id);
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        if($carts != null) {
            foreach ($carts as $cart) {
                $total += $cart["price"] * $cart["quantity"];
            }
        }

        $SameCategory = [];
        foreach ($size->product->categories as $category) {
            foreach ($products as $one_product){
                if($one_product->product->hascategory($category->name)){
                    array_push($SameCategory,$one_product->id);
                }
            }
        }
        $samecategoryarray = array_unique($SameCategory);

        return view('front.single-product',
            ['size' => $size, 'products' => $products, 'carts' => $carts,
             'in_carts' => $in_carts, 'total' => $total, 'samecategory' => $samecategoryarray, 'id' => $id]);

    }
}

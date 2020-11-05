<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            //dd($one_size);
        $size = Sizes::create(['product_id' => $product->id,
            'quantity' =>$one_size['quantity'],
            'unit' => $one_size['unit'],
            'stock' => $one_size['stock'],
            'price' => $one_size['price']
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
        $product->update($request->execept('photos'));

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

    public function  delete($id)
    {
        $product = Products::find($id);
        $product->show = 0;
        $product->save();

        return redirect('admin/products');
    }

    public function page($id){

        $size = Sizes::find($id);
        //dd($size);
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        if($carts != null)
            foreach($carts as $cart)
                $total += $cart["price"]*$cart["quantity"];




        return view('front.single-product', ['size' => $size,
                    'products' => $products, 'carts' => $carts,
                    'in_carts' => $in_carts, 'total' => $total]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Product_Categories;
use App\Products;
//use Gloudemans\Shoppingcart\Facades\Cart;
use App\Sizes;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        //session()->forget('cart');
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->orderBy('id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        //dd($carts);
        if($carts != null)
        foreach($carts as $cart)
            $total += $cart["price"]*$cart["quantity"];
        return view('front.site', ['products' => $products, 'in_carts' => $in_carts,'total' => $total,'carts' => $carts ]);
    }


    public function addtocart(Request $request)
    {
        $size = null;
        if($request->id) {
            $size = Sizes::with('product', 'product.materials')->find($request->id);

            $cart = session()->get('cart');

            if (!isset($cart[$request->id])) {
                $cart[$request->id]["product_id"] = $size->product_id;
                $cart[$request->id]["price"] = $size->price;
                $cart[$request->id]["quantity"] = 0;
            }
            if (!isset($cart[$request->id]["quantity"])) {
                $cart[$request->id]["quantity"] = 0;
            }
            if (isset($request->quantity)) {
                if (isset($request->action) && $request->action == 'add') {
                    $cart[$request->id]["quantity"] += $request->quantity;
                }
                if (isset($request->action) && $request->action == 'overwrite') {
                    $cart[$request->id]["quantity"] = $request->quantity;
                }
            }

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');

            $total =0;
            foreach ($cart as $one_cart) {
                $total += $one_cart["price"] * $one_cart["quantity"];
            }
            $size["subtotal"] = $cart[$request->id]["quantity"]*$cart[$request->id]["price"];

            $size["total"] = $total;

            $size["sizeOf"] = sizeof(session()->get('cart'));
        }

        return $size;
    }


    public function deletecart(Request $request)
    {

        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        $cart = session()->get('cart');
        $total =0;
        foreach ($cart as $one_cart) {
            $total += $one_cart["price"] * $one_cart["quantity"];
        }
        $size["total"] = $total;
        $size["sizeOf"] = sizeof(session()->get('cart'));
        $size['id'] = $request->id;

        return $size;
    }
}

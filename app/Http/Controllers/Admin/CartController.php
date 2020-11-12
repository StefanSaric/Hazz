<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use App\Cart;
use App\Sizes;

class CartController extends Controller
{

    public function cart()
    {
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
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
        return view('front.cart', ['products' => $products, 'in_carts' => $in_carts,'total' => $total, 'carts' => $carts]);
    }

    public function create()
    {
        $cart = Cart::all();
        return view('front.cart',['cart' => $cart]);
    }

    public function shop()
    {
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        if($carts != 0)
            foreach($carts as $cart)
                $total += $cart["price"]*$cart["quantity"];
        return view('front.shop', ['products' => $products, 'in_carts' => $in_carts,'carts' => $carts,'total' => $total]);
    }

    public function blog()
    {
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        if($carts != 0)
            foreach($carts as $cart)
                $total += $cart["price"]*$cart["quantity"];
        return view('front.blog', ['products' => $products, 'in_carts' => $in_carts,'carts' => $carts,'total' => $total]);
    }

    public function checkout()
    {
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        if($carts != 0)
            foreach($carts as $cart)
                $total += $cart["price"]*$cart["quantity"];
        return view('front.checkout', ['products' => $products, 'in_carts' => $in_carts,'carts' => $carts,'total' => $total]);
    }

    public function contact()
    {
        $products = Sizes::with('product', 'product.materials','product.categories','product.tags','product.sizes')->orderBy('product_id')->get();
        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        $total = 0;
        $carts = session()->get('cart');
        if($carts != 0)
            foreach($carts as $cart)
                $total += $cart["price"]*$cart["quantity"];
        return view('front.contact', ['products' => $products, 'in_carts' => $in_carts,'carts' => $carts,'total' => $total]);
    }
}

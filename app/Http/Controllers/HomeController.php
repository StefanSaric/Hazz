<?php

namespace App\Http\Controllers;

use App\Products;
//use Gloudemans\Shoppingcart\Facades\Cart;
use App\Sizes;
use Illuminate\Http\Request;
use App\Cart;

class HomeController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {

        //session()->forget('cart');
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
        return view('front.site', ['products' => $products, 'in_carts' => $in_carts,'total' => $total,'carts' => $carts ]);
    }


    public function addtocart(Request $request)
    {
        if($request->id) {
            $size = Sizes::find($request->id);
            $cart = session()->get('cart');
            $cart[$request->id]["product_id"] = $size->product_id;
            if ($request->quantity <> 1) {
                $cart[$request->id]["quantity"] = $request->quantity;
            } else {
                $cart[$request->id]["quantity"] = 1;
            }
            $cart[$request->id]["price"] = $size->price;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');

            $total =0;
            foreach ($cart as $one_cart) {
                $total += $one_cart["price"] * $one_cart["quantity"];
            }
        }
        return "true";
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
        return "true";
    }

}

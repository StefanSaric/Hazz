<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmOrder;
use App\Order;
use App\Products;
use App\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function create()
    {
        $orders = Order::all();
        return view('front.cart',['orders' => $orders]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $total = 0;
        $carts = session()->get('cart');
        if($carts != null)
            foreach($carts as $cart)
                $total += $cart["price"]*$cart["quantity"];
        $order = Order::create([
            'first_name' => $request->firstname, 'last_name' => $request->lastname, 'email' => $request->email, 'phone' => $request->phone,
            'address' => $request->address, 'num_of_house' => $request->num, 'num_of_apartment' => $request->apartment, 'city' => $request->city, 'total' => $total]);

        foreach ($carts as $one_cart)
            $cart = Cart::create(['product_id' => $one_cart["product_id"], 'price' => $one_cart["price"], 'quantity' => $one_cart["quantity"], 'order_id' => $order->id]);

        $in_carts = [];
        if(session()->get('cart') != null) {
            $in_carts = session()->get('cart');
        }
        foreach($in_carts as $key => $cart) {
            $size = Sizes::where('id', $key)->first();
            $left = $size->stock - $cart["quantity"];
            if ($size != null) {
                $size->update([
                    'stock' => $left
                ]);
            }
        }
        session()->forget('cart');


        $data = array(
            'order_id' => $order->id,
            'total' => $total,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'num' => $request->num,
            'apartment' => $request->apartment,
        );

        Mail::to($request->email)->send(new ConfirmOrder($data));

        return redirect('/');
    }

    public function index(){

        $orders = Order::all()->sortBy('status',false)->sortBy('update_at',false);

        return view('admin.orders.allorders',['active' => 'allOrders', 'orders' => $orders]);
    }

    public function details($id){

        $order = Order::with('cart','cart.product')->find($id);

        return view('admin.orders.details',['active' => 'allOrders', 'order' => $order]);
    }

    public function statusdelivered($id){

        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return redirect('admin/orders');
    }

    public function statusactive($id){

        $order = Order::find($id);
        $order->status = 0;
        $order->save();

        return redirect('admin/orders');
    }
}

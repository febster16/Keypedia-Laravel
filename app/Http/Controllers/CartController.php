<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Keyboard;
use App\Models\transactionDetail;
use App\Models\transactionHeader;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $data = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $date = new DateTime();
        $categories = Category::all();
        $product = Keyboard::where('id', '=', $request->id)->first();

        $cart = Cart::where('product_id', '=' ,$product['id'])->where('user_id', '=', Auth::user()->id)->first();
        if(empty($cart)){
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $product['id'];
            $cart->quantity = $data['quantity'];
        } else {
            $cart->quantity = $cart->quantity + $data['quantity'];
        }

        if($cart->save()) {
                return redirect()->back()->with(['date' => $date, 'categories'=>$categories, 'product'=>$product])->withSuccess($product['name']);
        }

        return redirect()->back()->withErrors("");
    }

    public function getCart() {
        $date = new DateTime();
        $categories = Category::all();
        $id = Auth::user()->id;
        $carts = Cart::where('user_id', '=', $id)->get();
        if(Auth::user()->role == 'manager'){
            return redirect('home')->with(['date' => $date]);
        }

        return view('cart', ['date' => $date, 'categories'=>$categories, 'carts'=>$carts]);
    }

    public function updateCart(Request $request) {
        $data = $request->validate([
            'quantity' => 'required|numeric|min:0',
        ]);

        $date = new DateTime();
        $categories = Category::all();

        $cart = Cart::find($request->id);
        if($data['quantity'] == 0) {
            $cart->delete();
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($cart->keyboard['name']);
        } else {
            $cart->quantity = $data['quantity'];
        }

        if($cart->save()) {
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($cart->keyboard['name']);
        }

        return redirect()->back()->withErrors("");
    }

    public function checkout($id) {
        $date = new DateTime();
        $categories = Category::all();
        $carts = Cart::where('user_id', '=', $id)->get();

        if(empty($carts)) {
            return view('home', ['date' => $date, 'categories' => $categories]);
        } else {
            $transactionHeader = new transactionHeader();
            $transactionHeader->user_id = $id;
            $transactionHeader->save();

            foreach($carts as $c) {
                $transactionDetail = new transactionDetail();
                $transactionDetail->transaction_id = $transactionHeader->id;
                $transactionDetail->name = $c->keyboard['name'];
                $transactionDetail->subtotal = $c->keyboard['price'] * $c->quantity;
                $transactionDetail->quantity = $c->quantity;
                $transactionDetail->image = $c->keyboard['image'];
                $transactionDetail->save();
            }

            $carts = Cart::where('user_id', '=', $id)->delete();
        }

        return redirect('home')->with(['date' => $date]);
    }

}

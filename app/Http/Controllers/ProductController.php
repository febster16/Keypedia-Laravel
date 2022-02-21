<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use App\Models\transactionDetail;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getCategory($id) {
        $date = new DateTime();
        $categories = Category::all();
        $categoryName = Category::where('id', $id)->first();
        $products = Keyboard::where('category_id', '=', $id)->paginate(8);
        return view('category', ['date' => $date, 'categoryName'=>$categoryName, 'categories'=>$categories, 'products'=>$products]);
    }

    public function viewSearch(Request $request) {
        $date = new DateTime();
        $categories = Category::all();
        $categoryName = Category::where('id', $request->id)->first();
        if($request->filter == 'name'){
            $products = Keyboard::where('name', 'LIKE', "%$request->search%")->where('category_id', '=', $request->id)->paginate(8);
        } elseif($request->filter == 'price') {
            $products = Keyboard::where('price', 'LIKE', "%$request->search%")->where('category_id', '=', $request->id)->paginate(8);
        }
        return view('category', ['date' => $date, 'categoryName'=>$categoryName, 'categories'=>$categories, 'products'=>$products]);
    }

    public function getProduct($id) {
        $date = new DateTime();
        $categories = Category::all();
        $product = Keyboard::where('id', '=', $id)->first();
        return view('product', ['date' => $date, 'categories'=>$categories, 'product'=>$product]);
    }

    public function updateProductPage($id) {
        $date = new DateTime();
        $categories = Category::all();

        if(Auth::user()->role == 'user'){
            return redirect('home')->with(['date' => $date]);
        }

        $product = Keyboard::where('id', '=', $id)->first();
        return view('updateProduct', ['date' => $date, 'categories'=>$categories, 'product'=>$product]);
    }

    public function deleteProduct($id) {
        $date = new DateTime();
        $categories = Category::all();

        $product = Keyboard::find($id);
        Storage::delete('public/'.$product->image);
        if($product->delete()) {
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($product->name);
        }
        return redirect()->back()->withErrors('failed to delete this product');
    }

    public function updateProduct(Request $request) {
        $date = new DateTime();
        $categories = Category::all();

        $data = $request->validate([
            'category'=> 'required',
            'name' => 'required|min:5',
            'price'=> 'min:1|numeric',
            'description'=> 'required|min:20',
        ]);

        $product = Keyboard::find($request->id);
        $transactionDetail = transactionDetail::where('name', 'LIKE', $product->name)->first();

        $file = $request->file('image');
        if($file != null) {
            $imageName = time().'_'.$file->getClientOriginalName();

            Storage::putFileAs('public/images', $file, $imageName);

            $imagePath = 'images/'.$imageName;

            Storage::delete('public/'.$product->image);
            $product->image = $imagePath;

            $transactionDetail->image = $imagePath;
        } else {
            $product->image = $product->image;
        }

        $product->category_id = $data['category'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['description'];

        $transactionDetail->name = $data['name'];
        $transactionDetail->save();

        if($product->save()) {
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($product->name);
        }

        return redirect()->back()->withErrors("");
    }

    public function addKeyboardPage() {
        $date = new DateTime();
        $categories = Category::all();

        if(Auth::user()->role == 'user'){
            return redirect('home')->with(['date' => $date]);
        }

        return view('addKeyboard', ['date' => $date, 'categories'=>$categories]);
    }

    public function addKeyboard(Request $request) {
        $date = new DateTime();
        $categories = Category::all();

        $data = $request->validate([
            'category'=> 'required',
            'name' => 'required|min:5',
            'price'=> 'min:1|numeric',
            'description'=> 'required|min:20',
            'image' => 'required',
        ]);

        $product = Keyboard::where('name', 'LIKE', $data['name'])->first();
        if($product != null) {
            return redirect()->back()->withErrors("Keyboard name already exists.");
        }

        $file = $request->file('image');

        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images', $file, $imageName);

        $imagePath = 'images/'.$imageName;

        $product = new Keyboard();
        $product->category_id = $data['category'];
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        $product->image = $imagePath;

        if($product->save()) {
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($product->name);
        }

        return redirect()->back()->withErrors("");
    }

}

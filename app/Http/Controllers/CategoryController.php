<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function manageCategoryPage() {
        $date = new DateTime();
        $categories = Category::all();

        if(Auth::user()->role == 'user'){
            return redirect('home')->with(['date' => $date]);
        }

        return view('manageCategory', ['date' => $date, 'categories'=>$categories]);
    }

    public function deleteCategory($id) {
        $date = new DateTime();
        $categories = Category::all();

        $category = Category::find($id);
        Storage::delete('public/'.$category->image);
        if($category->delete()) {
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($category->name);
        }
        return redirect()->back()->withErrors('failed to delete this category');
    }

    public function updateCategoryPage($id) {
        $date = new DateTime();
        $categories = Category::all();

        if(Auth::user()->role == 'user'){
            return redirect('home')->with(['date' => $date]);
        }

        $category = Category::where('id', '=', $id)->first();
        return view('updateCategory', ['date' => $date, 'categories'=>$categories, 'category'=>$category]);
    }

    public function updateCategory(Request $request) {
        $date = new DateTime();
        $categories = Category::all();

        $data = $request->validate([
            'name'=> 'required|min:5',
        ]);

        $category = Category::where('name', 'LIKE', $data['name'])->first();
        if($category != null) {
            return redirect()->back()->withErrors("Category name already exists.");
        }

        $category = Category::find($request->id);
        $file = $request->file('image');

        if($file != null) {
            $imageName = time().'_'.$file->getClientOriginalName();

            Storage::putFileAs('public/images', $file, $imageName);

            $imagePath = 'images/'.$imageName;

            Storage::delete('public/'.$category->image);
            $category->image = $imagePath;
        } else {
            $category->image = 'images/defaultImage.jpg';
        }

        $category->name = $data['name'];

        if($category->save()) {
            return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess($category->name);
        }

        return redirect()->back()->withErrors("");
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $categoryAll = Category::all();

        // ToDO later optimized
        $categories = Category::where('category_id', null)->get();

        foreach ($categories as $category) {
            $category->child = Category::where('category_id', $category->id)->get();
        }

        return view('admin.home', compact('categoryAll', 'categories'));
    }

    public function addNewCategory(Request $request)
    {
        $request->validate([
            'category' => 'min:1|max:100|unique:categories,category_name,except,id'
        ]);

        $category = new Category();
        $category->category_name = $request->get('category');
        if ($request->get('category_link_id') != -1) {
            $category->category_id = $request->get('category_link_id');
        }

        $category->save();

        Session::flash('message', 'Category has been created');
        return redirect()->back();
    }

    public function userHome()
    {
        $categories = Category::where('category_id', null)->get();

        foreach ($categories as $category) {
            $category->child = Category::where('category_id', $category->id)->get();
        }

        return view('user.home', compact('categories'));
    }
}

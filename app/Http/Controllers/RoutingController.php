<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class RoutingController extends Controller
{
    //
    public function dashboard()
    {
        return view('dashboard');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {   
        // Validate input fields
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_slug' => 'required|string|max:255',
            'category_descp' => 'required|string|max:500|min:150',
        ]);
        // Insert data into database
        Category::create([
            'name' => $request->category_name,
            'slug' => $request->category_slug,
            'description' => $request->category_descp,
        ]);

        return redirect()->route('categories')->with('success', 'Category added successfully!');
    }


    public function allArticles()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function editArticles()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
}

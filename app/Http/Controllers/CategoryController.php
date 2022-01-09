<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->paginate(2);
        return view('admin.categories.index', compact('categories'));
    }

    public function AddCat(Request $request)
    {
        // basic validation 
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',

        ]);

        // database posting
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('success', 'New Category Added !');
    }
}

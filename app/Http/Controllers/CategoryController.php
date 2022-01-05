<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCat(){
        return view('admin.categories.index');
    }

    public function AddCat(Request $request){
        // basic validation 
        $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        
    ]);
        
    }
}

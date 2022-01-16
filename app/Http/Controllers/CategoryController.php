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
        $categories = Category::latest()->paginate(4);
        $trashBin = Category::onlyTrashed()->latest()->paginate(2);

        return view('admin.categories.index', compact('categories', 'trashBin'));
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

    public function EditCat($id){
        $categories = Category::find($id);

        return view('admin.categories.edit', compact('categories'));
    }

    public function UpdateCat(Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('all.category')->with('success', 'Category Updated !');
    }

    public function SoftDelete($id){
        $delete = Category:: find($id)->delete();
        return Redirect()->back()->with('success', 'The Category Moved to Trash !');
    }

    public function Restore($id){
        $undo_delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Restored The Category From Trash !');
    }

    public function P_Delete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'The Category Deleted Permanently !');
    }






}

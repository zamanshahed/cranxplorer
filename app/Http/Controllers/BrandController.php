<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(4);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        // basic validation 
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $brand_img = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_img->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';

        //up image location with file name and ext
        $last_img = $up_location . $img_name;

        //upload action
        $brand_img->move($up_location, $img_name);

        //keep track in db
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        //action after adding a brand
        return Redirect()->back()->with('success', 'New Brand Added !');
    } //add brand ends

    //edit brand
    public function EditBrand($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }


    // update brand
    public function UpdateBrand(Request $request, $id)
    {
        // basic validation 
        $validated = $request->validate([
            'brand_name' => 'required|max:255',
        ]);

        $old_image = $request->old_image;
        $old_name =  $request->old_name;
        $brand_img = $request->file('brand_image');

        if ($brand_img) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_img->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';

            //up location with file name and ext
            $last_img = $up_location . $img_name;

            // delete old image and save new one
            unlink($old_image);
            $brand_img->move($up_location, $img_name);


            //keep track in db
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
        } else {
            //keep track in db
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
        }



        //action after updating brand
        return Redirect('/brand/all')->with('success', 'Brand: ' . $old_name . ' is Updated !');
    }
}

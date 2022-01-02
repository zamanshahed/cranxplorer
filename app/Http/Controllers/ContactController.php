<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        // echo"Now the page is served by ContactController!";
        return view('contact');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function list()
    {
        $brands = Brand::all();

        return view('list', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $newBrand = new Brand();
        $newBrand->name = $request->input('chatgpt_prompt');
        $newBrand->description = $request->input('chatgpt_response');
        $newBrand->save();

        return redirect('/')->with('message', 'Entry saved');
    }
}

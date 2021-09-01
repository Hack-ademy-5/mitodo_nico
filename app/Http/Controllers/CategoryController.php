<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view("categories");
    }

    public function store(Request $request)
    {
        //validar
        $validatedData = $request->validate([
            'name'=>'required'
        ]);

        //guarda en el db
        $category = new Category;

        $category->name = $validatedData['name'];

        $category->save();

        return back();

    }
}

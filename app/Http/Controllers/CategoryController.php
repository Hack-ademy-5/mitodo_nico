<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        if(!Auth::user()){
            // vuelve a la ruta donde estaba
            return redirect()->route('home')->withMessage('No estás autentificado');
        }
        return view("categories");
    }

    public function store(Request $request)
    {
        // verificar si el usuario está autentificado

        if(!Auth::user()){
            // vuelve a la ruta donde estaba
            return back()->withMessage('No estás autentificado');
        }
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

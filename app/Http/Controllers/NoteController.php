<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class NoteController extends Controller
{
    // CRUD
        // Create
        // Read (1,todos)
        // Update
        // Delete
    
    public function notes()
    {
        if(!Auth::user()){
        // vuelve a la ruta donde estaba
            return redirect()->route('home')->withMessage('No estás autentificado');
        }
        // recuperar las notas
        $notes = Note::orderBy('created_at','desc')->get();

        //select * from notes order by created_at desc;
        return view("welcome",compact('notes'));
    }

    public function create()
    {
        if(!Auth::user()){
            // vuelve a la ruta donde estaba
            return redirect()->route('home')->withMessage('No estás autentificado');
        }
        return view('notes-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text'=>'required|max:500',
            'category_id'=>'required'
        ]);

        // $note = new Note;

        // $note->text = $validatedData['text'];

        // $note->save();

        
        // recuperar la categoria
        $category = Category::findOrFail($validatedData['category_id']);

        // crear la nota a traves de la relacion notes de category
        $category->notes()->create([
            'text'=>$validatedData['text'],
        ]);

        //insert into notes (text) values ('nota desde mysql');

        return redirect()->route('home');
    }

	public function byCategory($id)
	{
		// recuperar las notas con categoria id

        $notes = Note::where('category_id',$id)->get();
        
        return view('welcome',compact('notes'));
	}
}

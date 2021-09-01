<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NoteController extends Controller
{
    
    public function notes()
    {
        // recuperar las notas
        $notes = Note::orderBy('created_at','desc')->get();
        //select * from notes order by created_at desc;
        return view("welcome",compact('notes'));
    }

    public function create()
    {
        return view('notes-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text'=>'required|max:500'
        ]);

        // $note = new Note;

        // $note->text = $validatedData['text'];

        // $note->save();

        // Mass assignment

        Note::create([
            'text'=>$validatedData['text']
        ]);

        //insert into notes (text) values ('nota desde mysql');

        return redirect()->route('home');
    }
}

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Mis Notas</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($notes as $note)
            <div class="col-12 col-md-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Nota #{{$loop->iteration}}</h5>
                      <p class="card-text">{{$note->text}}</p>
                      <div>{{$note->created_at}}</div>
                      <div><a href="{{route('notes.byCategory',['id'=>$note->category->id])}}">{{$note->category->name}}</a></div>
                      <div><a href="{{route('notes.byUser',['id'=>$note->user->id])}}">{{$note->user->name}}</a></div>
                      @auth
                      <form action="{{route('notes.destroy',['id'=>$note->id])}}" method="POST">
                        @csrf
                        @method('delete')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                      @endauth
                      <a href="{{route('notes.edit',['id'=>$note->id])}}" class="card-link">Edit</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
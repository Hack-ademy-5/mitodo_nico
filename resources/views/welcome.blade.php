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
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
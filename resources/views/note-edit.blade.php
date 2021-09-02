@extends('layouts.app')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-12'>
           <h1>Modifica tu nota</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{route('notes.update',['id'=>$note->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Texto de la nota</label>
                  <textarea name="text" id="" cols="30" rows="10" class="form-control">{{$note->text}}</textarea>
                  <div id="emailHelp" class="form-text">Escribe todo para que no se te olvide nada</div>
                  <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
              </form>
        </div>
    </div>
</div>
@endsection
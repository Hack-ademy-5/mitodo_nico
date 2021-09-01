@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($categories as $category)
                        <li>Id: {{$category->id}} - {{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Insert new category">
                    <button type="submit">Crear</button>
                </form>
            </div>
        </div>
    </div>
@endsection
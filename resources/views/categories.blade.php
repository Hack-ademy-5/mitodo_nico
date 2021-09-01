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
    </div>
@endsection
@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')


{{-- & the validation error message --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    {{-- <form method="POST" action="{{route('posts.store')}}"> --}}
        {{--& enctype="multipart/form-data" must put it in form to upload file in laravel  --}}
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        {{-- ! add @csrf --}}
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user" class="form-label">Image</label>
            <input class="form-control" name="image" type="file" id="formFile">
          </div>

        <button class="btn btn-success">Submit</button>
    </form>
@endsection

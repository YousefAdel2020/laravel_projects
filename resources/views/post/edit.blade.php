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
        <form method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                    @if ($post->user)
                    <option value="{{$user->id}}" {{$post->user->id === $user->id ? "selected" : ""}}>{{$user->name}}</option>
                    @else
                    <option value="{{$user->id}}" >{{$user->name}}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="user" class="form-label">Image</label>
            <input class="form-control" name="image" type="file" id="formFile">
          </div>


        <button class="btn btn-primary">update</button>
    </form>
@endsection

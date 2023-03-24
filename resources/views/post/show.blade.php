@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-6">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <p class="card-text">Description: {{$post['description']}}</p>
        </div>
    </div>

    <div class="card mt-6">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            @if ($post->user)
            <p class="card-text">Name: {{$post->user->name}}</p>
            <p class="card-text">Email: {{$post->user->email}}</p>         
            @endif
            <p class="card-text">Created At: {{$post->created_at->format('l jS \\of F Y h:i:s A') }}</p>
        </div>
    </div>




    {{-- & comments section --}}

@foreach ($post->comments as $comment)
<div class="card mt-6">
    <div class="card-body">
        <p class="card-text">{{$comment['content']}}</p>
    </div>
</div>
@endforeach
   

    <form method="POST" action="{{route('comments.store')}}">
        {{-- ! add @csrf --}}
        @csrf
 
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
            <input type="hidden" name="commentable_id" value="{{ $post->id }}">
            <input type="hidden" name="commentable_type" value="App\Models\Post">
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

      
     

        <button class="btn btn-success">add comment</button>
    </form>


@endsection

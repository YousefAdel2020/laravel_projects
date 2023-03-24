@extends('layouts.app');


@section('content')
    


    <div class="text-center">
        <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                {{--& we can use -> or [] to access the field because all() is magic function --}}
                {{-- <td>{{$post['id']}}</td> --}}
                <td>{{$post->id}}</td> 
                <td>{{$post['title']}}</td>
                @if ($post->user)
                    <td>{{$post->user->name}}</td>   

                @else
                <td>not found</td>  

                @endif
                
                <td>{{$post['created_at']->toDateString()}}</td>
                <td>
                    {{-- * send the request parameter with route() the second parameter is the req.params for url  --}}
                    <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    {{-- <a href="{{route('posts.destroy',$post['id'])}}" class="btn btn-danger">Delete</a> --}}
                </td>
            </tr>
        @endforeach



        </tbody>
    </table>
   

{{--& for pagination  --}}
{{ $posts->links() }}
@endsection




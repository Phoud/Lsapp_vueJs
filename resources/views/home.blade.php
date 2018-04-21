@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <br>
                    <h3>Our blog posts</h3>

                    @if(count($posts)>0)
                    <table class="table table-striped">
                       <tr>
                           <th>Title</th>
                           <th>Action</th>
                           <th></th>
                       </tr>
                    @foreach($posts as $post)
                       <tr>
                           <td>{{$post->title}}</td>
                           <td><a class="btn btn-warning" href="/posts/{{$post->id}}/edit">Edit</a></td>
                          
                           <td>{!!Form::open(['action' => ['PostsController@destroy', $post->id,],'onsubmit' => 'return ConfirmDelete()', 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

                                {!!Form::close()!!}</td>
                       </tr>
                       @endforeach
                    </table>
                    @else
                    <p>You have no Post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Operation</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach ($posts as $post)
                    <tr>

                        <td>{{ $post->title }}</td>

                        <td> {{  str_limit($post->body, 100) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                        <td>
                        <a href="{{ URL::to('posts/'.$post->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="text-center">
            {!! $posts->links() !!}
        </div>

        <a href="{{ URL::to('posts/create') }}" class="btn btn-success">Add Role</a>
@endsection

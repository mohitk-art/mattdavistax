@extends('back_layouts.app')

@section('content')
<div class="card p-4 mb-0">
    <h3 class="d-flex align-items-center justify-content-between">
        Blog List
        <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New blog</a>
    </h3>
                   

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ str_limit($blog->title, $limit = 30, $end = '....') }}</td>
            <td>{{ str_limit($blog->description , $limit = 50, $end = '....') }}</td>
            <td>
                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">

                    <a class="btn btn-info mr-2" href="{{ route('blogs.show',$blog->id) }}">Show</a>

                    <a class="btn btn-primary mr-2" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>

    {!! $blogs->links() !!}
    </div>
@endsection

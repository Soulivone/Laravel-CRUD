@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books Management </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/books/create" title="Create a user"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-responsive-lg">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->created_at }}</td>
                <td>{{ $book->updated_at}}</td>
                <td>
                    <form action="/books/{{$book->id}}" method="POST">
                        @csrf
                        <a href="/books/{{$book->id}}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection

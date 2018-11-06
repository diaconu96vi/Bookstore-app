@extends('layouts.homepage')

@section('content')
    <div class="container-fluid">
        <!-- <div class="col-md-8"> -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Add a book</h3>
            </div>
            <div class="container">
                <a href="#createTask" class="btn btn-info" data-toggle="collapse">Add</a>
                <div id="createTask" class="collapse">
                    <form method="POST" action="/books">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="author">Book author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>

                        <div class="form-group">
                            <label for="title">Book title</label>
                            <textarea id="title" class="form-control" name="title" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="publisher">Book publisher</label>
                            <input id="number" class="form-control" name="publisher" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Book price</label>
                            <input id="text" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="picture">Book picture</label>
                            <input id="text" class="form-control" name="picture" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add book</button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($errors->any())
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <hr>
            <div class="box-header">
                <h3 class="box-title">Current Books</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Picture</th>
                        <th>Options</th>
                    </tr>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->picture }}</td>
                            <td>
                            <span>
                                <a class="btn btn-small btn-success" href="{{ URL::to('books/' . $book->id . '/edit') }}">
                                    Edit
                                </a>
                                <form action="{{ route('books.destroy', $book->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>

                            </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>

@endsection
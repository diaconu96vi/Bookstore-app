@extends('layouts.homepage')

@section('content')

    <div class="container-fluid">
        <!-- <div class="col-md-8"> -->

        <div class="box">
            <div class="box-header">
                <h2>
                    Edit book: {{ $book->name }} | ID: {{ $book->id }}
                </h2>

            </div>
            <div class="container">
                <div id="createTask">
                    <form action="{{ route('books.update', $book->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="author">Book author</label>
                            <input type="text" class="form-control" id="author" value="{{$book->author}}" name="author" required>
                        </div>

                        <div class="form-group">
                            <label for="title">Book title</label>
                            <textarea id="title" class="form-control" name="title" required>{{$book->title}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="publisher">Book publisher</label>
                            <input id="number" class="form-control" value="{{$book->publisher}}" name="publisher" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Book price</label>
                            <input id="text" class="form-control" value="{{$book->price}}" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="picture">Book picture</label>
                            <input id="text" class="form-control" value="{{$book->picture}}" name="picture" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit book</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

@endsection
@extends('layouts/homepage')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($books as $book)
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel-body" style="height:350px">
                        <img src="{{ $book->picture }}" class="img-responsive"
                             style="height:200px;text-align:center;" alt="Image">
                        <h4><strong>Author:</strong> {{ $book->author }} </h4>
                        <h4><strong>Title:</strong> {{  $book->title }}</h4>
                        <h4><strong>Publisher:</strong> {{  $book->publisher }}</h4>
                        <h4><strong>Price:</strong> ${{ $book->price }} </h4>
                    </div>
                    <div class="panel-footer"><button class="btn btn-primary">Add to cart</button></div>
                </div>
            </div>
            @endforeach
        </div>
    </div><br>
@endsection('content')



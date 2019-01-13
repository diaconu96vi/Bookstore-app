@extends('layouts/homepage')

@section('content')
    <div class="container">
        <div class="row">
            @if(sizeof($books) != 0)
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
                            <div class="panel-footer"><a href="{{url('/addToCart', ['id' => $book->id])}}" class="btn btn-success">Add to cart</a></div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-sm4">
                    <img src="https://learn.getgrav.org/user/pages/11.troubleshooting/01.page-not-found/error-404.png" class="img-responsive">
                </div>
            @endif
        </div>
    </div><br>
@endsection('content')



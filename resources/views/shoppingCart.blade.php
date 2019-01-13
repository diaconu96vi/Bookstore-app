@extends('layouts/homepage')

@section('content')
    @if(Session::has('cart'))
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Options</th>
                </tr>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book['item']['author'] }}</td>
                        <td>{{ $book['item']['title'] }}</td>
                        <td>{{ $book['item']['price'] }}</td>
                        <td><span class="badge">{{ $book['qty']}}</span></td>
                        <td><span class="badge btn-primary">{{ $book['price'] }}</span></td>
                        <td>
                            <div class="btn btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span clas="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Reduce by 1</a></li>
                                    <li><a href="#">Reduce all</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tfoot>
                    <th><strong>Total : {{$totalPrice}} </strong></th>
                </tfoot>
            </table>
            <hr>
            <a href="{{url('/checkout')}}" type="button" class="btn btn-success">Checkout</a>
        </div>
    @else
        <div class="box-body no-padding">
            <div class="container">
                <h2> No items in cart!</h2>
            </div>
        </div>

    @endif

@endsection('content')

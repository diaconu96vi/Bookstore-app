<div class="jumbotron">
    <div class="container text-center">
        <h1>Bookstore</h1>
        <p>Best Online Store</p>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bookstore LOGO</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/home">Home</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Stores</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><form action="{{url('search')}}">
                        <input type="text" class="form-control" name="searchData" placeholder="Search by title">
                    </form></li>
                @if(Auth::check())
                    @if(Auth::user()->admin == 1)
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/books') }}">Manage products</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account : {{ Auth::user()->name }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    @endif
                @else
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                @endif
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>
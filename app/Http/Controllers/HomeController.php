<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showProducts()
    {
        $books = Book::all();
        return view('products', compact('books'));
    }

    public function editUserInfo()
    {
        $user = User::find(Auth::user()->id);
        return view('userInfo', compact('user'));
    }

    public function updateUserInfo()
    {
        $user  = User::find(Auth::user()->id);
        //validate input
        $this->validate(request(),[
            'name' => 'required|unique:users,name,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|min:6'
        ]);
        //update
        if(Hash::check(request('password'), $user->password)) {
            $user->name = request('name');
            $user->email = request('email');
            if (request('newPassword') != "" && request('newPassword') == request('confirmPassword')) {
                $user->password = Hash::make(request('newPassword'));
            }
            $user->save();
        }
        return view('userInfo', compact('user'));
    }

    public function addToCart($id)
    {
        $book = Book::find($id);
        $oldCart = null;
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }

        $cart = new Cart($oldCart);
        $cart->add($book, $book->id);
        Session::put('cart', $cart);
        return redirect('/products');
    }

    public function showCart(){
        if(!Session::has('cart')){
            return view('shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shoppingCart', ['books' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}

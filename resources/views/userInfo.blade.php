@extends('layouts/homepage')

@section('content')
    <div class="container-fluid">
        <!-- <div class="col-md-8"> -->

        <div class="box">
            <div class="box-header">
                <h2>
                    Edit Account: {{ $user->name }}
                </h2>

            </div>
            <div class="container">
                <div id="createTask">
                    <form action="{{ url('/updateUserInfo')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="userName">User name</label>
                            <input type="text" class="form-control" id="userName" value="{{$user->name}}" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">User email</label>
                            <input type="email" id="email" class="form-control" value="{{$user->email}}" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Current password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" id="newPassword" class="form-control" name="newPassword">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm password</label>
                            <input type="password" id="confirmPassword" class="form-control" name="confirmPassword">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save details</button>
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
@endsection('content')



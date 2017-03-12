@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>My Account</h4>
                <ul class="nav nav-tabs nav-stacked">
                    <li class="active"><a href="{{ url('/account/settings')}}"><i class="glyphicon glyphicon-user"></i> Basic Information</a></li>
                    <li><a href="{{ url('/account/password')}}"><i class="glyphicon glyphicon-lock"></i> Password</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>


                </ul><br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Survey">
                    <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
                </div>
            </div>

            <div class="col-sm-9">
                <h4>Basic Information</h4>
                <h6>Update your personal information and account settings here.</h6>


                <form class="form-horizontal" align="left">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{ Auth::user()->email }}</p><hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name: </label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="inputName" value="{{ Auth::user()->name }}">
                            <hr></div>
                    </div>
                </form>

            <div>

                <button type="button" class="btn btn-primary">Update Account</button>


            </div>

            </div>
        </div>
    </div>

@endsection

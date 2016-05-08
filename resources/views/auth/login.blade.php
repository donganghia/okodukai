@extends('app')

{{-- Web site Title --}}
@section('title') {{{ trans('site/user.login') }}} :: @parent @stop

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>{{{ trans('site/user.login_to_account') }}}</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Login</div>--}}
                    {{--<div class="panel-body">--}}

                        @include('errors.list')

                        <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/auth/login') !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <!--<label class="col-md-4 control-label">E-Mail Address</label>-->
                                <label class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <!-- <input type="email" class="form-control" name="email" value="{{ old('email') }}"> -->
                                    <input type="text" class="form-control" name="username" value=""> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        Login
                                    </button>

                                    <!-- <a href="{!! URL::to('/password/email') !!}">Forgot Your Password?</a> -->
                                </div>
                            </div>
                        </form>
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

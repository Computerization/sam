@extends('layouts.semantic')

@section('content')
    <div class="ui raised padded text container segment">
        <div class="ui center aligned container">
            <h1 class="ui header">{{ trans('login.register') }}</h1>
        </div>
        <div class="ui divider"></div>
            <form  role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="ui stackable grid">
                <br>
                <div class="row">
                    <div class="column">
                        <div class="ui tiny fluid message">
                            填写用户名时，请输入您的真实姓名，以方便工作人员联系您。
                        </div>
                    </div>
                </div>
                <br />
                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="six wide column"><lable for="name">姓名</lable></div>
                    <div class="ten wide column ">
                        <div class="ui fluid input">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        @if ($errors->has('name'))
                            <br>
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="six wide column"><lable for="email">{{ trans('login.email') }}</lable></div>
                    <div class="ten wide column ">
                        <div class="ui fluid input">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <i class="red warning sign icon"></i>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="six wide column"><lable for="password">{{ trans('login.password') }}</label></div>
                    <div class="ten wide column ">
                        <div class="ui fluid input">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <i class="red warning sign icon"></i>
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="six wide column"><lable for="password_confirm">{{ trans('login.confirm_password') }}</label></div>
                    <div class="ten wide column ">
                        <div class="ui fluid input">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="center aligned column">
                        <button type="submit" class="ui teal large button">
                            <i class="user plus icon"></i>
                            {{ trans('login.register') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

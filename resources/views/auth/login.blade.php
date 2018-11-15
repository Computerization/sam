@extends('layouts.semantic')
@section('content')
    <br />
    <div class="ui  grid stackable container">
        <div class="three column row">
            <div class="ui column"></div>
            <div class="ui column">
                <div class="ui segment">
                    @if(session("reset") == 1)
                        <div class="ui green icon message">
                            <i class="check icon"></i>
                            账号激活成功！
                        </div>
                    @endif
                    <div class="ui center aligned container">
                        <h1 class="ui header">{{ trans('login.login') }}</h1>
                    </div>

                    <div class="ui divider"></div>

                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="ui left icon fluid  input">
                            <i class="envelope outline icon"></i>
                            <input id="email" type="email" class="form-control" placeholder="邮箱" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br />
                    <div class="ui left icon fluid input">
                        <i class="key icon"></i>
                        <input id="password" type="password" class="form-control" placeholder="密码" name="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <br />
                    <div class="ui checkbox">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label> {{ trans('login.remember') }} </label>
                    </div>
                    <br /><br />
                    <div class="ui center aligned container">
                        <button type="submit" class="ui teal button">
                            <i class="sign in alternate icon"></i>
                            {{ trans('login.login') }}
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ trans('login.forget') }}
                        </a>
                    </div>
                    </form>
            </div>
        </div>
        <div class="ui column"></div>
        </div>
    </div>
@endsection

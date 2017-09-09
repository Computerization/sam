@extends('layouts.control_center')

@section('control_content')
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{ trans('account.profile_edit') }}</h4></div>

                <div class="panel-body">
                  @if ($errors->any())
                      <div class="alert alert-warning">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  @if (session('status'))
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      编辑成功
                    </div>
                    <div class="panel-body">
                      账户信息已更新
                    </div>
                  </div>
                  @endif

                      <form method="post" action="{{ URL::action('AccountController@profile_edit_store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="email">{{ trans('resume.email') }}</label>
                          <input type="email" readonly value="{{ $user->email }}" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                          <label for="name">{{ trans('resume.true_name') }}</label>
                          <input type="text" value="{{ $user->name }}"  class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">{{ trans('resume.submit') }}</button>
                      </form>

                </div>
            </div>
@endsection

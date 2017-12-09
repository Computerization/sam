@extends('layouts.app_bs4')

@section('content')
<div class="container">
@if(session("reset") == 2)
        <div class="alert alert-warning" role="alert">
        激活码无效或已使用。
        </div>
        @endif
<div class="col-md-6">

<div class="card">
  <div class="card-body">
    <h4 class="card-title">请激活账号</h4>
    <h6 class="card-subtitle mb-2">您的账号尚未激活。为了获得完整的功能，您需要输入激活码。</h6>

    <form method="post" action="{{ URL::action('ActivateAccountController@verify') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="code">激活码</label>
        <input type="text" class="form-control" id="code" name="code">
        <small id="emailHelp" class="form-text text-muted">激活码通常为6位字母和数字组成的序列。</small>
    </div>
    <button type="submit" class="btn btn-primary">立即激活</button>
    </form>

  </div>
</div>

</div>

</div>


@endsection
@extends('layouts.control_center')

@section('control_content')
            <div class="card">
                <div class="card-header"><h4>{{ trans('account.profile_edit') }}</h4></div>

                <div class="card-body">
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
                  <div class="card text-white bg-primary">
                    <div class="card-header">
                      编辑成功
                    </div>
                    <div class="card-body">
                      账户信息已更新
                    </div>
                  </div>
                  @endif

                  @if (session('fail'))
                  <div class="card text-white bg-primary">
                    <div class="card-header">
                      上传失败
                    </div>
                    <div class="card-body">
                      {{ session('error') }}
                    </div>
                  </div>
                  @endif

                  <form method="post" action="{{ URL::action('FileController@post_avatar') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($user->files->where('type',1)->count()>0)
                      <div href="col-md-4 col-xs-6" class="thumbnail">
                        <img style='max-width: 30em;max-height:30em;' src="{{ URL::action('FileController@get_image',['id'=>$user->files->where('type',1)->first()->id]) }}">
                      </div>
                    @endif
                    <div class="form-group">
                      <label for="file">{{ trans('resume.file') }}</label>
                      <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <input type="hidden" name="type" value="1" id="type">
                    <button type="submit" class="btn btn-primary btn-lg">{{ trans('resume.submit') }}</button>
                  </form>

                  <hr>

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

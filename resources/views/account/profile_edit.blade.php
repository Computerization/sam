@extends('layouts.semantic')
@extends('layouts.control_center')

@section('control_content')
        <div class="ui raised padded text container segment">

                <div class="ui padded basic center aligned segment">
                  <h1 class="ui header">{{ trans('account.profile_edit') }}</h1>
                </div>
                <hr>
                <div class="ui vertical segment">
                  
                  @if ($errors->any())
                      <div class="ui red ignored icon message ">
                          <i class="warning sign icon"></i>
                          <div class="content">
                              @foreach ($errors->all() as $error)
                                {{ $error }}
                                <br>
                              @endforeach
                          </div>
                      </div>
                  @endif

                  @if (session('status'))
                  <div class="ui green icon message ">
                    <i class="check icon"></i>
                    <div class="content">
                      <div class="header">
                        编辑成功
                      </div>
                      <p>
                        账户信息已更新
                      </p>
                    </div>
                  </div>
                  @endif

                  @if (session('fail'))
                  <div class="ui red icon message ">
                    <i class="warning sign icon"></i>
                    <div class="content">
                      <div class="header">
                        上传失败
                      </div>  
                      <p>
                        {{ session('error') }}
                      </p>
                    </div>
                  </div>
                  @endif
                  <h3> <i class="user circle grey large icon"></i> 更改头像 </h3>
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
                    <button type="submit" class="ui btn btn-primary btn-lg button"><i class="upload icon"></i>{{ trans('resume.submit') }}</button>
                  </form>
                    
                </div>
                <div class="ui vertical segment">
                  <h3> <i class="edit outline  icon"></i> 编辑信息 </h3>
                      <form method="post" action="{{ URL::action('AccountController@profile_edit_store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <h4 for="email"><i class="icon envelope blue outline"></i>{{ trans('resume.email') }}</h4>
                          <div class="ui large input">
                            <input type="email" readonly value="{{ $user->email }}" class="ui input form-control" id="email" name="email">
                          </div>
                        </div>
                        <br>
                        <div class="form-group">  
                          <h4 for="name"><i class="icon user grey outline"></i>{{ trans('resume.true_name') }}</h4>
                          <div class="ui large input">
                            <input type="text" value="{{ $user->name }}"  class=" form-control" id="name" name="name">
                          </div>
                        </div>
                        <button type="submit" class="ui btn teal btn-primary btn-lg button"><i class="upload icon"></i>{{ trans('resume.submit') }}</button>
                      </form>
                </div>
            </div>
@endsection

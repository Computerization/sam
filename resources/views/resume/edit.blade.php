@extends('layouts.control_center')

@section('control_content')

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>{{ trans('resume.edit_resume') }}</h4>
        </div>
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
              您的简历已保存
            </div>
          </div>
          @endif

              <form method="post" action="{{ URL::action('ResumeController@save') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="email">{{ trans('resume.email') }}</label>
                  <input type="email" readonly value="{{ $resume->email }}" class="form-control" id="email" name="email">
                </div>
                <hr>
                <div class="form-group">
                  <label for="name">{{ trans('resume.true_name') }}</label>
                  <input type="text" value="{{ $resume->name }}"  class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="contact">{{ trans('resume.contact') }}</label>
                  <input type="text" value="{{ $resume->contact }}"  class="form-control" id="contact" name="contact">
                </div>
                <div class="form-group">
                  <label for="stunumber">{{ trans('resume.student_number') }}</label>
                  <input type="text"  value="{{ $resume->student_number }}" class="form-control" id="stunumber" name="student_number">
                </div>
                <div class="form-group">
                  <label for="addinfo">{{ trans('resume.additional_info') }}</label>
                  <textarea id="addinfo"  class="form-control" name="additional_info" rows="3">{{ $resume->additional_info }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">{{ trans('resume.submit') }}</button>
              </form>

        </div>
      </div>

@endsection

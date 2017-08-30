@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="panel">
        <div class="panel-heading">
          <h4>{{ trans('resume.view_resume') }}</h4>
        </div>
        <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="name">{{ trans('resume.true_name') }}</label>
                  <input type="text" readonly value="{{ $resume->name }}"  class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="email">{{ trans('resume.email') }}</label>
                  <input type="email" readonly value="{{ $resume->email }}" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="contact">{{ trans('resume.contact') }}</label>
                  <input type="text" readonly value="{{ $resume->contact }}"  class="form-control" id="contact" name="contact">
                </div>
                <div class="form-group">
                  <label for="stunumber">{{ trans('resume.student_number') }}</label>
                  <input type="text" readonly value="{{ $resume->student_number }}"  class="form-control" id="stunumber" name="student_number">
                </div>
                <div class="form-group">
                  <label for="addinfo">{{ trans('resume.additional_info') }}</label>
                  <textarea id="addinfo" readonly class="form-control" name="additional_info" rows="3">{{ $resume->additional_info }}</textarea>
                </div>
              </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

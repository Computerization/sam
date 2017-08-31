@extends('layouts.control_center')

@section('control_content')
          <h1>{{ trans('org.view_resumes') }}</h1>
          <hr>
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="row">
              @foreach($resumes as $resume)
                <div class="col-md-6 col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <span class="lead">{{ trans('resume.true_name') }} - {{ $resume->name }}</span>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-4 col-xs-4"><p>{{ trans('resume.student_number') }}</p></div>
                        <div class="col-md-8 col-xs-8"><p>{{ $resume->student_number }}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-xs-4"><p>{{ trans('resume.email') }}</p></div>
                        <div class="col-md-8 col-xs-8"><p>{{ $resume->email }}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-xs-4"><p>{{ trans('resume.contact') }}</p></div>
                        <div class="col-md-8 col-xs-8"><p>{{ $resume->contact }}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-xs-4"><p>{{ trans('resume.additional_info') }}</p></div>
                        <div class="col-md-8 col-xs-8"><p>{{ $resume->additional_info }}</p></div>
                      </div>
                    </div>
                    <div class="panel-footer">
                      {{ $resume->created_at }}
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
@endsection

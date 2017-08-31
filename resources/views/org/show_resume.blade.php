@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
          <h1>{{ trans('org.view_resumes') }}</h1>

          <hr>
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="row">
              @foreach($resumes as $resume)
                <div class="col-md-6 col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-6"><span class="lead">{{ trans('resume.true_name') }} - {{ $resume->name }}</span></div>
                        <div class="col-md-6">
                          <span class="lead">
                            {{ trans('resume.student_number') }} - {{ $resume->student_number }}
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2 col-xs-4"><p>{{ trans('resume.email') }}</p></div>
                        <div class="col-md-4 col-xs-8"><p>{{ $resume->email }}</p></div>
                        <div class="col-md-2 col-xs-4"><p>{{ trans('resume.contact') }}</p></div>
                        <div class="col-md-4 col-xs-8"><p>{{ $resume->contact }}</p></div>
                      </div>
                      <div class="row">
                        <div class="col-md-2 col-xs-4"><p>{{ trans('resume.additional_info') }}</p></div>
                        <div class="col-md-10 col-xs-8"><p>{{ $resume->additional_info }}</p></div>
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
        </div>
    </div>
</div>
@endsection

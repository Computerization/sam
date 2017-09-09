@extends('layouts.control_center')

@section('control_content')
      <div class="panel panel-default">
        <div class="panel-heading">
          @if($type)
            <h4>{{ trans('org.edit_org') }}</h4>
          @else
            <h4>{{ trans('org.create_org') }}</h4>
          @endif
        </div>
        <div class="panel-body">
          @if ($errors->any())
          <div class="panel panel-warning">
            <div class="panel-heading">
              {{ trans('org.error') }}
            </div>
            <div class="panel-body">
              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
            </div>
          </div>
          @endif

          @if($type)
          <form method="post" action="{{ URL::action('OrganizationController@store', ['id'=>$org->id]) }}">
          @else
          <form method="post" action="{{ URL::action('OrganizationController@save') }}">
          @endif
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">{{ trans('org.name') }}</label>
              <input type="text" class="form-control" id="name" name="organization_name" @if($type) value="{{ $org->organization_name }}"  @endif>
            </div>
            <div class="form-group">
              <label for="contact">{{ trans('org.contact') }}</label>
              <input type="text" class="form-control" id="contact" name="organization_contact" @if($type) value="{{ $org->organization_contact }}"  @endif>
            </div>
            <div class="form-group">
              <label for="description">{{ trans('org.description') }}</label>
              <textarea id="description"  name="organization_description" rows="3">@if($type) {!! $org->organization_description !!} @endif</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">{{ trans('resume.submit') }}</button>
          </form>
        </div>
      </div>

@endsection

@section('control_scripts')

<script>
$(document).ready(function () {
  var editor = new Simditor({
  textarea: $('#description'),
  upload: {
    url: '/image',
    params: { _token: '{{ csrf_token() }}', type: 2 },
    fileKey: 'file',
    connectionCount: 1,
    leaveConfirm: 'Uploading is in progress, are you sure to leave this page?',
  },
  });
});

</script>
@endsection

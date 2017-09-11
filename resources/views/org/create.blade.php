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
          <h4>{{ trans('org.cover') }}</h4>
          <form method="post" action="{{ URL::action('FileController@post_org_avatar', ['id'=>$org->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if($org->file_id)
              <div href="col-md-4 col-xs-6" class="thumbnail">
                <img style='max-width: 30em;max-height:30em;' src="{{ URL::action('FileController@get_image',['id'=>$org->file_id]) }}">
              </div>
            @endif
            <div class="form-group">
              <label for="file">{{ trans('resume.file') }}</label>
              <input type="file" class="form-control" id="file" name="file">
            </div>
            <input type="hidden" name="type" value="2" id="type">
            <button type="submit" class="btn btn-primary btn-lg">{{ trans('resume.submit') }}</button>
          </form>
          <hr>
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
              <label for="intro">{{ trans('org.description') }}</label>
              <textarea id="intro" class="form-control" name="organization_intro" rows="3">@if($type) {!! $org->organization_intro !!} @endif</textarea>
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

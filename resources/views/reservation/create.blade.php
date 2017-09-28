@extends('layouts.control_center')

@section('control_content')
<div class="panel">
  <div class="panel-heading">
    <h4>Add Resource</h4>
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
    <form class="form-horizontal" method="post" action="{{ URL::action('ResourceController@store') }}">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="inputName" class="col-sm-2 control-label">Name</label>
    		<div class="col-sm-10">
    			<input type="text" name="name" class="form-control" id="inputName" placeholder="Name" />
    		</div>
    	</div>
    	<div class="form-group">
    		<label for="description" class="col-sm-2 control-label">Description</label>
    		<div class="col-sm-10">
    			<textarea name="description" id="description" placeholder="Description" ></textarea>
    		</div>
    	</div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          		<button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
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

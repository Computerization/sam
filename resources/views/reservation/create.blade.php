@extends('layouts.control_center')

@section('control_content')
<div class="card">
  <div class="card-header">
    <h4>Add Resource</h4>
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="card texgt-white bg-warning">
      <div class="card-header">
        {{ trans('org.error') }}
      </div>
      <div class="card-body">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
      </div>
    </div>
    @endif
    <form method="post" action="{{ URL::action('ResourceController@store') }}">
    	{{ csrf_field() }}
    	<div class="row form-group">
    		<label for="inputName" class="col-sm-2 control-label">Name</label>
    		<div class="col-sm-10">
    			<input type="text" name="name" class="form-control" id="inputName" placeholder="Name" />
    		</div>
    	</div>
    	<div class="row form-group">
    		<label for="description" class="col-sm-2 control-label">Description</label>
    		<div class="col-sm-10">
    			<textarea name="description" id="description" placeholder="Description" ></textarea>
    		</div>
    	</div>
        <div class="row form-group">
          <div class="offset-sm-2 col-sm-10">
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

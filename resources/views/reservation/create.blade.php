@extends('layouts.control_center')

@section('control_content')
<div class="panel">
  <div class="panel-heading">
    <h4>Add Resource</h4>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" method="post" action="{{ URL::action('ResourceController@store') }}">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="inputName" class="col-sm-2 control-label">Name</label>
    		<div class="col-sm-10">
    			<input type="text" name="name" class="form-control" id="inputName" placeholder="Name" />
    		</div>
    	</div>
    	<div class="form-group">
    		<label for="inputDescrip" class="col-sm-2 control-label">Description</label>
    		<div class="col-sm-10">
    			<input type="text" name="description" class="form-control" id="inputDescrip" placeholder="Description" />
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

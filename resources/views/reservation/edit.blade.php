<form method="post" action="{{ URL::action('ResourceController@update', ['resource' => $resource]) }}">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
  <input type="text" value="{{ $resource->name }}" name="name"> <br>
  <input type="text" value="{{ $resource->description }}" name="description">
  <button type="submit">Submit</button>
</form>

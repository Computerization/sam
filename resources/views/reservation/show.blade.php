{{ $resource->name }} <br>
{{ $resource->description }}

<a href="{{ URL::action('ResourceController@edit', ['resource' => $resource]) }}">Edit</a> <br>
<form method="post" action="{{ URL::action('ResourceController@destroy', ['resource' => $resource]) }}">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button type="submit">Delete</button>
</form>

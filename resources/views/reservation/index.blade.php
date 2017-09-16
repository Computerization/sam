@foreach($resources as $resource)
 <br>
<a href="{{ URL::action('ResourceController@show', ['resource' => $resource]) }}">{{ $resource->name }}</a> <br>
@endforeach

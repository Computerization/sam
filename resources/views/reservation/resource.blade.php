  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      @if( $resource->files->count() )
      <img src="/image/{{ $resource->files->first()->id }}" alt="...">
      @endif
      <div class="caption">
        <h3><a href="{{ URL::action('ResourceController@show', ['resource' => $resource]) }}">{{ $resource->name }}</a></h3>
        <p>{{ $resource->description }}</p>
      </div>
    </div>
  </div>

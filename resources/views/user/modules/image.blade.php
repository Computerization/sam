<div class="ui three stackable cards">
  @foreach($user->files()->where('type', '<', 3)->get() as $image)
  <div class="card">
    <div class="image">
      <img src="{{ URL::action('FileController@get_image', ['id' => $image->id]) }}">
    </div>
    <div class="content">
      <div class="header">
        {{ $image->original_name }}
      </div>
      <div class="meta">
        {{ $image->user->name }} 上传于 {{ $image->created_at }}
      </div>
    </div>
  </div>
  @endforeach
</div>

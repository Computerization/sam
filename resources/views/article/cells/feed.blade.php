<div class="ui feed">

  <div class="event">
    <!-- @if($comment->user->files->where('type',1)->count())
    <div class="label">
      <img src="{{ URL::action('FileController@get_image',['id'=>$comment->user->files->where('type',1)->first()->id]) }}">
    </div>
    @endif -->
    <div class="content">
      <div class="summary">
        <a class="user">
          {{ $comment->user->name }}
        </a>
        回复到：
        {{ $comment->content }}
        <div class="date">
          {{ $comment->created_at }}
        </div>
      </div>
    </div>
  </div>

</div>

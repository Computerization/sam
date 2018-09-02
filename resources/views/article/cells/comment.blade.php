<div class="comment">
  <a class="avatar">
    @if($comment->user->files->where('type',1)->count())
    <img src="{{ URL::action('FileController@get_image',['id'=>$comment->user->files->where('type',1)->first()->id]) }}">
    @endif
  </a>
  <div class="content">
    <a class="author">{{ $comment->user->name }}</a>
    <div class="metadata">
      <span class="date">{{ $comment->created_at }}</span>
    </div>
    <div class="text">
      {{ $comment->content }}
    </div>
    <div class="ui mini buttons">
      <button class="ui green button" type="submit" form="support-{{ $comment->id }}">
        <i class="icon thumbs up outline"></i>
        {{$comment->upvote}}
      </button>
      <form id="support-{{ $comment->id }}" action="{{ URL::action('CommentController@attitude') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="comment_id" value="{{ $comment->id }}"><br>
        <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.SUPPORT') }}">
      </form>
      <div class="or"></div>
      <form id="against-{{ $comment->id }}" action="{{ URL::action('CommentController@attitude') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="comment_id" value="{{ $comment->id }}"><br>
        <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.AGAINST') }}">
      </form>
      <button class="ui red button" type="submit" form="against-{{ $comment->id }}">
        <i class="thumbs down icon outline"></i>
        {{$comment->downvote}}
      </button>
    </div>
    <!-- <div class="actions">
    </div> -->
  </div>
</div>

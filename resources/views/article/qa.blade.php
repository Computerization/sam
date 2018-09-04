@extends('layouts.semantic')

@section('title')
{{ $article->title }} -
@endsection

@section('content')

<div class="ui hidden divider"></div>

@if($article->organization)
<div class="ui container centered grid stackable">
  <div class="eight wide column">
    @include('org.modules.cells.namecard', ['org' => $article->organization])
  </div>
</div>
@endif

<div class="ui container centered grid stackable">

<div class="twelve wide column">

  <!-- <div class="ui piled segment"> -->
    <span class="ui violet ribbon large label">问答</span>

    <h1 class="ui header">{{ $article->title }}</h1>

    <div class="ui container">
      <p>
        @include('user.cells.namecard_small', ['user' => $article->user])
        {{ $article->created_at }}
      </p>
    </div>

    <div class="ui hidden divider"></div>

    <div id="article-container" class=" content-expansion">{{ $article->content }}</div>

    <div class="ui aligned centered header">
      <!-- <div class="ui buttons"> -->
        <button class="ui primary basic button" type="submit" form="support">
          <i class="icon plus"></i>
          关注 ({{$article->upvote}})
        </button>
        <form id="support" action="{{ URL::action('ArticleController@attitude') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="article_id" value="{{ $article->id }}"><br>
          <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.SUPPORT') }}">
        </form>
        <!-- <form id="against" action="{{ URL::action('ArticleController@attitude') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="article_id" value="{{ $article->id }}"><br>
          <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.AGAINST') }}">
        </form>
        <div class="or"></div>
        <button class="ui red basic button" type="submit" form="against">
          <i class="thumbs down icon outline"></i>
          反对 ({{$article->downvote}})
        </button> -->
      <!-- </div> -->
    </div>

  <!-- </div> -->

</div>

</div>

<div class="ui container centered grid stackable">
<div class="twelve wide column">
  <!-- <div class="ui raised segment"> -->
    <h3 class="ui dividing header">回复</h3>
    <div class="ui divided items">
    @foreach($article->comments as $comment)

      <div class="item">
        <div class="content">

          <p>
              @include('user.cells.namecard_small', ['user' => $comment->user]) {{ $comment->created_at }}
              <span class="ui right floated">
                  #{{ $loop->iteration }}楼
              </span>
          </p>

          <div class="description">
            <div class="ui grid">
              <div class="fifteen wide column right floated marked-parse content-expansion">{{ $comment->content }}</div>
            </div>
          </div>
          <form id="support-{{ $comment->id }}" action="{{ URL::action('CommentController@attitude') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="comment_id" value="{{ $comment->id }}"><br>
            <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.SUPPORT') }}">
          </form>
          <div class="ui buttons">
                <button class="ui green basic button" type="submit" form="support-{{ $comment->id }}">
                  <i class="icon thumbs up outline"></i>
                  支持 ({{$comment->upvote}})
                </button>
                <div class="or"></div>
                <button class="ui red basic button" type="submit" form="against-{{ $comment->id }}">
                  <i class="thumbs down icon outline"></i>
                  反对 ({{$comment->downvote}})
                </button>
              </div>
              <form id="against-{{ $comment->id }}" action="{{ URL::action('CommentController@attitude') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="comment_id" value="{{ $comment->id }}"><br>
                <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.AGAINST') }}">
              </form>
        </div>
      </div>



    @endforeach
    <form class="ui reply form" action="{{ URL::action('CommentController@store') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="article_id" value="{{ $article->id }}">
      <div class="field">
        <textarea name="content"></textarea>
      </div>
      <button class="ui blue labeled submit icon button" type="submit">
        <i class="icon edit"></i> 回复
      </button>
    </form>
  </div>
<!-- </div> -->

</div>

</div>
@endsection


@section('scripts')
<script type="text/javascript">
document.getElementById('article-container').innerHTML = marked(document.getElementById('article-container').innerHTML);

var markeds = document.getElementsByClassName("marked-parse");
for( var y = 0, j = markeds.length; y < j; y++){
  // alert(markeds[y].innerHTML);
	markeds[y].innerHTML = marked(markeds[y].innerHTML);
}
</script>
@endsection

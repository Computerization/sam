@extends('layouts.semantic')

@section('title')
{{ $article->title }} -
@endsection

@section('content')

<div class="ui hidden divider"></div>

<div class="ui container centered grid stackable">

<div class="ten wide column">

  <div class="ui piled segment">
    <span class="ui red ribbon large label">通知</span>

    <h1 class="ui aligned centered header">{{ $article->title }}</h1>

    <div class="ui grid">
      <div class="eight wide column centered row">
      <p>
        @include('user.cells.namecard_small', ['user' => $article->user])
      </p>
      <p>
        <span>
          发布时间：{{ $article->created_at }}
        </span><br>
        <span>开始时间：{{ $article->start_at }}</span><br>
        <span>截止时间：{{ $article->due_at }}</span>
      </p>
      </div>
    </div>

    <div class="ui hidden divider"></div>

    <div id="article-container">{{ $article->content }}</div>

    <div class="ui aligned centered header">
      <div class="ui buttons">
        <button class="ui primary basic button" type="submit" form="support">
          <i class="icon bookmark outline"></i>
          收到 ({{$article->upvote}})
        </button>

        <form id="support" action="{{ URL::action('ArticleController@attitude') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="article_id" value="{{ $article->id }}"><br>
          <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.SUPPORT') }}">
        </form>

        <form id="against" action="{{ URL::action('ArticleController@attitude') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="article_id" value="{{ $article->id }}"><br>
          <input type="hidden" name="action_secondary_type" value="{{ config('organization.attitude.AGAINST') }}">
        </form>

        <button class="ui green basic button" type="submit" form="against">
          <i class="icon check"></i>
          已完成 ({{$article->downvote}})
        </button>
      </div>
    </div>

    <div class="ui hidden divider"></div>

    <div class="ui horizontal divider">
      <i class="icon bookmark outline"></i>
      以下用户已收到
    </div>
    <div>
      @foreach($article->get_upvote as $user)
      &nbsp;&nbsp;<span>{{ $user->name }}</span>&nbsp;&nbsp;
      @endforeach
    </div>

    <div class="ui hidden divider"></div>


    <div class="ui horizontal divider">
      <i class="icon check"></i>
      以下用户已完成
    </div>
    <div>
      @foreach($article->get_downvote as $user)
      &nbsp;&nbsp;<span>{{ $user->name }}</span>&nbsp;&nbsp;
      @endforeach
    </div>

    <div class="ui hidden divider"></div>


  </div>

</div>

</div>
@if($article->organization)
<div class="ui container centered grid stackable">
  <div class="eight wide column">
    @include('org.modules.cells.namecard', ['org' => $article->organization])
  </div>
</div>
@endif

<div class="ui container centered grid stackable">
<div class="ten wide column">
  <div class="ui raised segment">

  <div class="ui threaded comments container">
    <h3 class="ui dividing header">评论</h3>
    @foreach($article->comments as $comment)
      @include('article.cells.comment')
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
</div>

</div>

</div>
@endsection


@section('scripts')
<script type="text/javascript">
document.getElementById('article-container').innerHTML = marked(document.getElementById('article-container').innerHTML);
</script>
@endsection

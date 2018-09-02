@extends('layouts.semantic')

@section('title')
{{ $article->title }} -
@endsection

@section('content')

<div class="ui hidden divider"></div>

<div class="ui container centered grid stackable">

<div class="twelve wide column">

  <div class="ui piled segment">
    <span class="ui blue ribbon large label">文章</span>

    <h1 class="ui aligned centered header">{{ $article->title }}</h1>

    <div class="ui grid">
      <div class="eight wide column centered row">
      <p>
        @include('user.cells.namecard_small', ['user' => $article->user])
      </p>
      <p>{{ $article->created_at }}</p>
      </div>
    </div>

    <div class="ui hidden divider"></div>

    <div>{{ $article->content }}</div>

    <div class="ui aligned centered header">
      <div class="ui buttons">
        <button class="ui green button" type="submit" form="support">
          <i class="icon thumbs up outline"></i>
          支持 ({{$article->upvote}})
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
        <div class="or"></div>
        <button class="ui red button" type="submit" form="against">
          <i class="thumbs down icon outline"></i>
          反对 ({{$article->downvote}})
        </button>
      </div>
    </div>

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
<div class="twelve wide column">
  <div class="ui raised segment">

  <div class="ui threaded comments container">
    <h3 class="ui dividing header">Comments</h3>
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
        <i class="icon edit"></i> Add Reply
      </button>
    </form>
  </div>
</div>

</div>

</div>
@endsection

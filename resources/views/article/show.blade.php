@extends('layouts.semantic')

@section('title')
{{ $article->title }} -
@endsection

@section('content')

<div class="ui container piled segment">
    <h1 class="ui header">{{ $article->title }}</h1>

    <div class="ui grid">
      <div class="eight wide column centered row">
        <!-- <div class="six wide column">
          @if($article->user->files->where('type',1)->count())
          <img class="ui medium circular image" src="{{ URL::action('FileController@get_image',['id'=>$article->user->files->where('type',1)->first()->id]) }}">
          @endif
        </div>
        <div class="ten wide column"> -->
          <b>
            {{ $article->user->name }}
          </b> - <span>{{ $article->created_at }}</span>
        <!-- </div> -->
      </div>
    </div>
    <div class="ui hidden divider"></div>

    <p>{{ $article->content }}</p>
</div>

<div class="ui container raised segment">
  <div class="ui threaded comments container">
  <h3 class="ui dividing header">Comments</h3>
  @foreach($article->comments as $comment)
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
      <div class="actions">
        <a class="reply">Reply</a>
      </div>
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
      <i class="icon edit"></i> Add Reply
    </button>
  </form>
</div>
</div>

@endsection

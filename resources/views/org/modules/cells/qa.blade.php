
<div class="item">
  @if($article->pictures->count())
  <div class="image">
    <img src="{{ URL::action('FileController@get_image',['id'=>$article->pictures->first()->id]) }}">
  </div>
  @endif
  <div class="content">
    <a class="header" href="{{ URL::action('ArticleController@show', ['id' => $article->id]) }}">{{ $article->title }}</a>
    <div class="meta">
    </div>
    @if($article->comments->count())
    <div class="description">
      <p>
        @include('user.cells.namecard_small', ['user' => $article->comments()->latest()->first()->user])
         {{ $article->comments()->latest()->first()->created_at }}
      </p>
      <p class="content-preview">{{ $article->comments()->latest()->first()->content }}</p>
    </div>
    <div class="extra">
      <a class="ui right floated" href="{{ URL::action('ArticleController@show', ['id' => $article->id]) }}">
        更多回答
        <i class="right chevron icon"></i>
      </a>
      <span>关注 {{ $article->upvote }}</span>
      <span class="ui violet label">问答</span>
      <div class="ui label">Tag</div>
    </div>
    @else
    <div class="description">
      暂无回答
    </div>
    <div class="extra">
      <a class="ui right floated" href="{{ URL::action('ArticleController@show', ['id' => $article->id]) }}">
        发布回答
        <i class="right plus icon"></i>
      </a>
      <span>关注 {{ $article->upvote }}</span>
      <span class="ui violet label">问答</span>
      <div class="ui label">Tag</div>
    </div>
    @endif
  </div>
</div>


<div class="item">
  <!-- <div class="image">
    <img src="/images/wireframe/image.png">
  </div> -->
  <div class="content">
    <a class="header" href="{{ URL::action('ArticleController@show', ['id' => $article->id]) }}"><span class="ui violet ribbon label">问答</span>{{ $article->title }}</a>
    <div class="meta">
    </div>
    <div class="description">
      <p>
        @include('user.cells.namecard_small', ['user' => $article->user])
        | {{ $article->created_at }}
      </p>
      <p class="content-preview">{{ $article->content }}</p>
    </div>
    <div class="extra">
      <a class="ui right floated primary button" href="{{ URL::action('ArticleController@show', ['id' => $article->id]) }}">
        查看详情
        <i class="right chevron icon"></i>
      </a>
      <div class="ui label">Tag</div>
    </div>
  </div>
</div>

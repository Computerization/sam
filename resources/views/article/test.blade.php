<h1>文章测试页</h1>
@foreach($articles as $article)
<hr>
{{ $article->id}}
<h2>{{ $article->title }}</h2>
<p>{{ $article->content }}</p>
@foreach($article->comments as $comment)
<br>
<b>{{ $comment->user->name }}</b>
<p>{{ $comment->content }}</p>
@endforeach

@endforeach

<hr>
<form class="" action="{{ URL::action('ArticleController@store') }}" method="post">
  {{ csrf_field() }}
  Article ID <input type="text" name="id" value=""><br>
  Title <input type="text" name="title" value=""><br>
  Content <textarea name="content" rows="8" cols="80"></textarea>
  <button type="submit">Submit</button>
</form>

<hr>
<form class="" action="{{ URL::action('CommentController@store') }}" method="post">
  {{ csrf_field() }}
  Comment ID <input type="text" name="id" value=""><br>
  Article ID <input type="text" name="article_id" value=""><br>
  Content <textarea name="content" rows="8" cols="80"></textarea>
  <button type="submit">Submit</button>
</form>
<hr>
<form class="" action="{{ URL::action('ArticleController@attitude') }}" method="post">
  {{ csrf_field() }}
  Article ID <input type="text" name="article_id" value=""><br>
  Attitude <input type="text" name="action_secondary_type" value="">
  <button type="submit">Submit</button>
</form>

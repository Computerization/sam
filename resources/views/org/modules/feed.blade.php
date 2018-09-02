
<div class="ui container centered grid">

  <div class="twelve wide column ui divided items">
      @foreach($org->articles as $article)
        @if($article->content_type == config('organization.content_type.ARTICLE'))
          @include('org.modules.cells.article')
        @elseif($article->content_type == config('organization.content_type.DISCUSS'))
          @include('org.modules.cells.discuss')
        @elseif($article->content_type == config('organization.content_type.QA'))
          @include('org.modules.cells.qa')
        @elseif($article->content_type == config('organization.content_type.TODO'))
          @include('org.modules.cells.todo')
        @endif
      @endforeach
  </div>

</div>

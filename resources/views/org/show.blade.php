@extends('layouts.semantic')

@section('title')
{{ $org->organization_name }} - Student Organizations -
@endsection

@section('content')
<div class="ui hidden divider"></div>

<div class="ui container stackable grid">
  <div class="four wide column">

    @if($org->file_id)
    <div class="ui container grid">
      <div class="twelve wide column centered">
        <img class="ui medium rounded image" src="/image/{{ $org->file_id }}">
      </div>
    </div>
    @endif
    <!-- <div class="ui hidden divider"></div> -->
    <h1 class="ui center aligned header">{{ $org->organization_name }}</h1>

    <div class="ui center aligned header large labels">
      <a class="ui olive label">IB<div class="detail">C</div></a>
      <a class="ui red label">IB<div class="detail">A</div></a>
      <a class="ui blue label">IB<div class="detail">S</div></a>
      <a class="ui orange label">Tech</a>
      <a class="ui large green label">Sport</a>
      <a class="ui teal label">Art</a>
      <a class="ui violet label">Debate</a>
      <a class="ui purple label">Volunteer</a>
    </div>

    <!-- <div class="ui hidden divider"></div> -->

    <div class="ui container segment">
      <p>{{ $org->organization_intro }}</p>
    </div>

    <form class="" action="{{ URL::action('OrganizationController@toggle_member', ['id'=>$org->id]) }}" method="post">
      {{ csrf_field() }}
      <button type="submit" name="button" class="fluid ui primary button"><i class="plus icon"></i>申请加入/退出</button>
    </form>

    <!-- <div class="ui hidden divider"></div> -->
    <div class="ui secondary container large vertical pointing menu">
      <a class="item" href="{{ URL::action('OrganizationController@show_feed', ['id' => $org->id]) }}" id="show-feed">
        <i class="icon feed"></i>
        动态
      </a>
      <a class="item" href="{{ URL::action('OrganizationController@show_article', ['id' => $org->id]) }}" id="show-article">
        <i class="icon file alternate outline"></i>
        文章
      </a>
      <a class="item" href="{{ URL::action('OrganizationController@show_discuss', ['id' => $org->id]) }}" id="show-discuss">
        <i class="icon comments outline"></i>
        讨论
      </a>
      <a class="item" href="{{ URL::action('OrganizationController@show_qa', ['id' => $org->id]) }}" id="show-qa">
        <i class="icon question"></i>
        问答
      </a>
      <a class="item" href="{{ URL::action('OrganizationController@show_todo', ['id' => $org->id]) }}" id="show-todo">
        <i class="icon lightbulb outline"></i>
        通知
      </a>
      <a class="item" href="{{ URL::action('OrganizationController@show_member', ['id' => $org->id]) }}" id="show-member">
        <i class="icon users"></i>
        团队
      </a>
      <a class="item" href="{{ URL::action('OrganizationController@show_about', ['id' => $org->id]) }}" id="show-about">
        <i class="icon tag"></i>
        关于我们
      </a>
    </div>

  </div>
  <div class="twelve wide column">


    @if($show == 0)

    <div class="ui horizontal divider">
      <h1>
        <i class="rss icon"></i>
        动态
      </h1>
    </div>

    <div class="ui aligned center header">
      <div class="ui vertical labeled icon buttons">
        <a href="{{ URL::action('ArticleController@create') }}" class="ui green button">
          <i class="plus icon"></i>
          发布新文章
        </a>
      </div>
    </div>
    @include('org.modules.feed', ['articles' => $org->articles])

    @elseif($show == 1)

    <div class="ui horizontal divider">
      <h1>
        <i class="file alternate outline icon"></i>
        文章
      </h1>
    </div>
    <div class="ui aligned center header">
      <div class="ui vertical labeled icon buttons">
        <a href="{{ URL::action('ArticleController@create') }}" class="ui green button">
          <i class="plus icon"></i>
          发布新文章
        </a>
      </div>
    </div>
    @include('org.modules.feed', ['articles' => $org->articles->where('content_type', config('organization.content_type.ARTICLE')) ])

    @elseif($show == 2)

    <div class="ui horizontal divider">
      <h1>
        <i class="comments icon"></i>
        讨论
      </h1>
    </div>
    <div class="ui aligned center header">
      <div class="ui vertical labeled icon buttons">
        <a href="{{ URL::action('ArticleController@create') }}" class="ui green button">
          <i class="icon comments outline"></i>
          发布新文章
        </a>
      </div>
    </div>
    @include('org.modules.feed', ['articles' => $org->articles->where('content_type', config('organization.content_type.DISCUSS')) ])

    @elseif($show == 3)

    <div class="ui horizontal divider">
      <h1>
        <i class="icon question"></i>
        问答
      </h1>
    </div>
    <div class="ui aligned center header">
      <div class="ui vertical labeled icon buttons">
        <a href="{{ URL::action('ArticleController@create') }}" class="ui green button">
          <i class="plus icon"></i>
          发布新文章
        </a>
      </div>
    </div>
    @include('org.modules.feed', ['articles' => $org->articles->where('content_type', config('organization.content_type.QA')) ])

    @elseif($show == 4)

    <div class="ui horizontal divider">
      <h1>
        <i class="icon lightbulb outline"></i>
        通知
      </h1>
    </div>
    <div class="ui aligned center header">
      <div class="ui vertical labeled icon buttons">
        <a href="{{ URL::action('ArticleController@create') }}" class="ui green button">
          <i class="plus icon"></i>
          发布新文章
        </a>
      </div>
    </div>
    @include('org.modules.feed', ['articles' => $org->articles->where('content_type', config('organization.content_type.TODO')) ])


    @elseif($show == 5)

    <div class="ui horizontal divider">
      <h1>
        <i class="users icon"></i>
        团队
      </h1>
    </div>
    @if(Auth::check() && Auth::id() == $org->user_id)
    <div class="ui aligned center header">
      <div class="ui vertical labeled icon buttons">
        <a href="#" class="ui green button setting-button">
          <i class="plus icon"></i>
          新建用户组
        </a>
      </div>
    </div>
    @endif

    @include('org.modules.team')

    @elseif($show == 6)

    <div class=" ui horizontal divider" id="organization_description">
      <h1>
        <i class="tag icon"></i>
        社团简介
      </h1>
    </div>
    @include('org.modules.description')

    @endif

  </div>
</div>

<!-- <div class="ui center aligned grid">
  <a href="#organization_description" class="ui primary button">关于我们</a>
</div> -->

<!-- <div class="ui hidden divider"></div> -->
<!-- <div class="ui hidden divider"></div> -->


@endsection

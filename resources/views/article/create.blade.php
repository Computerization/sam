@extends('layouts.semantic')

@section('title')
New Article -
@endsection

@section('content')

<h1 class="ui aligned centered header">New Article</h1>

<div class="ui container piled segment">

  <form class="ui form" action="{{ URL::action('ArticleController@store') }}" method="post">
    {{ csrf_field() }}
    <div class="field">
      <label>Title</label>
      <input type="text" name="title">
    </div>

    <div class="field">
      <label>Content</label>
      <textarea name="content"></textarea>
    </div>
    <button class="ui button" type="submit">Submit</button>
  </form>

  <!-- <form class="" >
    Article ID <input type="text" name="id" value=""><br>
    Title <input type="text" name="title" value=""><br>
    Content <textarea name="content" rows="8" cols="80"></textarea>
    <button type="submit">Submit</button>
  </form> -->

</div>


@endsection

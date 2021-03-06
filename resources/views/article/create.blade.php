@extends('layouts.semantic')

@section('title')
New Article -
@endsection

@section('content')

<h1 class="ui aligned centered header">发布内容</h1>

<div class="ui container piled segment">

  <form class="ui form" action="{{ URL::action('ArticleController@store') }}" method="post">
    {{ csrf_field() }}
    <div class="field">
      <label>社团ID</label>
      <input type="text" name="organization_id">
    </div>


      <div class="field">
        <label>内容类型</label>
        <select class="ui fluid dropdown" name="content_type">
          <option value="{{ config('organization.content_type.ARTICLE') }}">文章</option>
          <option value="{{ config('organization.content_type.DISCUSS') }}">讨论</option>
          <option value="{{ config('organization.content_type.QA') }}">问答</option>
          <option value="{{ config('organization.content_type.TODO') }}">通知</option>
        </select>
      </div>

    <div class="field">
      <label>标题</label>
      <input type="text" name="title">
    </div>

    <div class="field">
      <label>内容（支持Markdown格式）</label>
      <textarea name="content"></textarea>
    </div>

    <div class="two fields">
       <div class="field">
         <label>内容状态</label>
         <select class="ui fluid dropdown" name="content_status">
           <option value="{{ config('organization.status.PUBLIC') }}">公开</option>
           <option value="{{ config('organization.status.ORGANIZATION_PRIVATE') }}">仅社团成员可见</option>
           <option value="{{ config('organization.status.PERSONAL_PRIVATE') }}">仅作者可见</option>
         </select>
       </div>
       <div class="field">
         <label>允许评论</label>
         <select class="ui fluid dropdown" name="comment_status">
           <option value="1">是</option>
           <option value="0">否</option>
         </select>
       </div>
     </div>

     <div class="ui form">
       <div class="two fields">
         <div class="field">
           <label>开始时间</label>
           <div class="ui calendar" id="rangestart">
             <div class="ui input left icon">
               <i class="calendar icon"></i>
               <input type="text" name="start_at" placeholder="Start">
             </div>
           </div>
         </div>
         <div class="field">
           <label>结束时间</label>
           <div class="ui calendar" id="rangeend">
             <div class="ui input left icon">
               <i class="calendar icon"></i>
               <input type="text" name="due_at" placeholder="End">
             </div>
           </div>
         </div>
       </div>
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

@section('scripts')

<script type="text/javascript">
$('#rangestart').calendar({
  type: 'datetime',
  endCalendar: $('#rangeend'),
  formatter: {
    datetime: function (date, settings) {
          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          var hour = date.getHours();
          var minute = date.getMinutes();
          // var second = date.getSeconds();
          return year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':00';
    }
  }
});
$('#rangeend').calendar({
  type: 'datetime',
  startCalendar: $('#rangestart'),
  formatter: {
    datetime: function (date, settings) {
          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          var hour = date.getHours();
          var minute = date.getMinutes();
          // var second = date.getSeconds();
          return year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':00';
    }
  }
});
</script>

@endsection

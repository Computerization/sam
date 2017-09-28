<div class="col-md-4">
  <div class="panel">
    <div class="panel-body">
      @if($reservation -> user_id == Auth::id())
      <p><span class="label label-primary">我的</span></p>
      @endif
      <p><i class="fa fa-user"></i> {{ $reservation -> user -> name }}</p>
      <p>预约地点：{{ $reservation -> resource -> name }}</p>
      <p>时间：{{ $reservation -> started_at }} 至 {{ $reservation -> ended_at }}</p>
      <p>备注： {{ $reservation -> message }}</p>
    </div>
  </div>
</div>


@foreach($org->authentication as $auth)
<div class="ui container stackable grid">
  <div class="four wide column">
    <h2>{{ $auth->auth_name }}</h2>
    <p>{{ $auth->auth_description }}</p>
  </div>
  <div class="twelve wide column">
    <div class="ui two stackable cards">
      @foreach($auth->members as $member)
      <div class="ui card">
        <div class="content">
          <div class="ui grid">
            <div class="six wide column">
              @if($member->files->where('type',1)->count())
              <img class="ui medium circular image" src="{{ URL::action('FileController@get_image',['id'=>$member->files->where('type',1)->first()->id]) }}">
              @else
              <img class="ui medium circular image" src="/image/">
              @endif
            </div>
            <div class="ten wide column">
              <h3>
                {{ $member->name }}
              </h3>
              <p>
                {{ $member->pivot->member_role }}
              </p>
              @if(Auth::check() && Auth::id() == $org->user_id)
              <a href="#" class="ui mini button setting-button" data-uid="{{ $member->id }}" data-uname="{{ $member->name }}" data-urole="{{ $member->pivot->member_role }}"><i class="cog icon"></i>设置</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endforeach

<div class="ui horizontal divider">
<h3>非正式成员</h3>
</div>
<div class="ui container stackable grid">
  <div class="four wide column">
    <h2>加入申请</h2>
    <p>等待加入的成员</p>
  </div>
  <div class="twelve wide column">
    <div class="ui two stackable cards">
      @foreach($org->pending_members as $member)
      <div class="ui card">
        <div class="content">
          <div class="ui grid">
            <div class="six wide column">
              @if($member->files->where('type',1)->count())
              <img class="ui medium circular image" src="{{ URL::action('FileController@get_image',['id'=>$member->files->where('type',1)->first()->id]) }}">
              @else
              <img class="ui medium circular image" src="/image/">
              @endif
            </div>
            <div class="ten wide column">
              <h3>
                {{ $member->name }}
              </h3>
              <p>
                {{ $member->pivot->member_role }}
              </p>
              @if(Auth::check() && Auth::id() == $org->user_id)
              <a href="#" class="ui mini button setting-button" data-uid="{{ $member->id }}" data-uname="{{ $member->name }}" data-urole="{{ $member->pivot->member_role }}"><i class="cog icon"></i>设置</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="ui tiny modal" id="setting-modal">
    <i class="close icon"></i>
    <div class="header">
      成员设置 - <span id="ugroupmodal-uname"></span>
    </div>
    <div class="content">
      <form class="ui form" action="{{ URL::action('OrganizationController@change_authentication', ['id'=>$org->id]) }}" method="post">
        {{ csrf_field() }}
        <h4 class="ui dividing header">用户权限</h4>
        <div class="field">
          <label for="user-group">选择用户组</label>
          <input type="hidden" name="user_id" id="ugroup-member-id" value="">
          <select class="ui fluid select" name="organization_authentication_id">
            @foreach($org->authentication as $auth)
            <option value="{{ $auth->id }}">{{ $auth->auth_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="field">
          <label for="">成员描述</label>
          <input type="text" name="member_role" id="ugroup-member-role">
        </div>
        <div class="field">
          <button class="ui primary button" type="submit">提交</button>
        </div>
      </form>

      <form class="ui form" action="{{ URL::action('OrganizationAuthenticationController@store', ['id'=>$org->id]) }}" method="post">
        {{ csrf_field() }}
        <h4 class="ui dividing header">新建用户组</h4>
        <div class="field">
          <label for="">用户组名称</label>
          <input type="text" name="auth_name">
        </div>
        <div class="field">
          <label for="">用户组描述</label>
          <input type="text" name="auth_description">
        </div>
        <input type="hidden" name="auth_json" value="{}">
        <input type="hidden" name="id" value="">
        <div class="field">
          <button class="ui primary button" type="submit">提交</button>
        </div>
      </form>
    </div>
  </div>

@section('scripts')
<script type="text/javascript">
  $(".setting-button").click(function(){
    $("#ugroupmodal-uname").html($(this).attr("data-uname"));
    $("#ugroup-member-id").val($(this).attr("data-uid"));
    $("#ugroup-member-role").val($(this).attr("data-urole"));
    // alert($(this).attr("data-uname"));
    // alert("HI")
    $("#setting-modal").modal('show');
  });
</script>
@endsection

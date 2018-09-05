<h1>测试页面</h1>
<hr>
<h1>加入/退出社团</h1>
<form class="" action="{{ URL::action('OrganizationController@toggle_member', ['id'=>$org_id]) }}" method="post">
  {{ csrf_field() }}
  <button type="submit" name="button">加入/退出社团</button>
</form>
<hr>
<h1>添加/修改权限</h1>
<form class="" action="{{ URL::action('OrganizationAuthenticationController@store', ['id'=>$org_id]) }}" method="post">
  {{ csrf_field() }}
  Auth ID <input type="text" name="id" value=""><br>
  Auth Name <input type="text" name="auth_name"><br>
  Auth Description <input type="text" name="auth_description"><br>
  Auth Content JSON<input type="text" name="auth_json" value=""><br>
  <button type="submit" name="button">Submit</button>
</form>
<hr>
<form class="" action="{{ URL::action('OrganizationController@change_authentication', ['id'=>$org_id]) }}" method="post">
  {{ csrf_field() }}
  User ID <input type="text" name="user_id" value=""><br>
  Auth ID <input type="text" name="organization_authentication_id" value=""><br>
  Role Description <input type="text" name="member_role" value=""><br>
  <button type="submit" name="">Submit</button>
</form>
<hr>
<form class="" action="{{ URL::action('OrganizationAuthenticationController@destroy', ['id' => $org_id]) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  Auth ID <input type="text" name="authentication_id" value=""><br>
  <button type="submit">删除</button>
</form>

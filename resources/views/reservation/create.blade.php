<form method="post" action="{{ URL::action('ResourceController@store') }}">
  {{ csrf_field() }}
  <input type="text" name="name"> <br>
  <input type="text" name="description">
  <button type="submit">Submit</button>
</form>

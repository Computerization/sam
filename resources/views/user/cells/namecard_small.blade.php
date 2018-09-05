@if($user->files->where('type',1)->count())
<img class="ui avatar image" src="{{ URL::action('FileController@get_image',['id'=>$user->files->where('type',1)->first()->id]) }}">
@endif
<b>{{ $user->name }}</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ $user->motto }}</span>&nbsp;&nbsp;&nbsp;

<img class="ui avatar image" src="{{ URL::action('FileController@get_image',['id'=>$user->files->where('type',1)->first()->id]) }}">
<b>{{ $user->name }}</b> | Motto


@foreach($org->authentication as $auth)
<div class="ui container stackable grid">
  <div class="four wide column">
    <h2>{{ $auth->auth_name }}</h2>
    <p>{{ $auth->auth_description }}</p>
  </div>
  <div class="twelve wide column">
    <div class="ui three stackable cards">
      @foreach($auth->members as $member)
      <div class="ui card">
        <div class="content">
          <div class="ui grid">
            <div class="six wide column">
              @if($member->files->where('type',1)->count())
              <img class="ui medium circular image" src="{{ URL::action('FileController@get_image',['id'=>$member->files->where('type',1)->first()->id]) }}">
              @endif
            </div>
            <div class="ten wide column">
              <h3>
                {{ $member->name }}
              </h3>
              <p>
                {{ $member->pivot->member_role }}
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endforeach

<div class="column">
  <div class="ui raised fluid card">
    <div class="blurring dimmable image org-cell">
      <div class="ui dimmer">
        <div class="content">
          <p class="hideoverflow">{{ $org->organization_intro }}</p>
          <a class="ui primary button" href="{{ url('org', $org->id) }}">Details</a>
        </div>
      </div>
      <img src="/image/{{ $org->file_id }}">
    </div>
    <div class="content">
      <a class="header" href="{{ url('org', $org->id) }}">{{ $org->organization_name }}</a>
      <div class="meta">
        <span class="date">Created by {{ $org->user->name }}</span>
      </div>
    </div>
    <div class="extra content">
      <a>
        <i class="users icon"></i>
        2 Members
      </a>
    </div>
    @if(Auth::check())
    @if(Auth::id() == $org->user_id)
    <div class="extra content">
      <div class="ui two buttons">
        <a class="ui basic button blue" href="{{ URL::action('OrganizationController@edit', ['id' => $org->id]) }}">{{ trans('org.edit') }}</a>
        <a class="ui basic button blue" href="{{ URL::action('OrganizationController@show_resumes', ['id' => $org->id]) }}">{{ trans('org.view_resumes') }}</a>
      </div>
    </div>
    @endif
    @endif
  </div>
</div>

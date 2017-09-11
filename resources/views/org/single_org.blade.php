<div class="@if($wide) col-md-6 @else col-md-4 @endif col-sm-6 col-xs-12">
  <div class="thumbnail">
      @if($org->file_id)
      <img src="/image/{{ $org->file_id }}" alt="...">
      @endif
      <div class="caption">
        <h3>{{ $org->organization_name }}</h3>
        <p>{{ $org->organization_intro }}</p>
        <p><i class="fa fa-user-o" aria-hidden="true"></i> {{ $org->user->name }}</p>
        <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $org->organization_contact }}</p>
        <p>
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <a href="{{ url('org', $org->id) }}" class="btn btn-default">{{ trans('org.detail') }}</a>
            </div>
            @if(Auth::check())
            @if(Auth::id() != $org->user_id)
            <div class="btn-group" role="group">
              <a class="btn btn-default" href="{{ URL::action('OrganizationController@join',$org->id) }}">{{ trans('org.join') }}</a>
            </div>
            @else
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ trans('org.manage') }} <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::action('OrganizationController@edit', ['id' => $org->id]) }}">{{ trans('org.edit') }}</a></li>
                <!-- <li role="separator" class="divider"></li> -->
                <li><a href="{{ URL::action('OrganizationController@show_resumes', ['id' => $org->id]) }}">{{ trans('org.view_resumes') }}</a></li>
              </ul>
            </div>
            @endif
            @endif
          </div>
        </p>
      </div>
  </div>
</div>

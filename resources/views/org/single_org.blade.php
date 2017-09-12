<div class="@if($wide) col-md-6 @else col-md-3 @endif col-sm-6 col-xs-12">
  <div class="thumbnail">
      @if($org->file_id)
      <img src="/image/{{ $org->file_id }}" alt="...">
      @endif
      <div class="caption">
        <h3><a href="{{ url('org', $org->id) }}">{{ $org->organization_name }}</a></h3>
        <p>{{ $org->organization_intro }}</p>
        <p>
          <div class="btn-group" role="group">
            @if(Auth::check())
            @if(Auth::id() == $org->user_id)
            <br>
            <span class="button-dropdown" data-buttons="dropdown">
              <button class="button button-rounded">
                {{ trans('org.manage') }} <i class="fa fa-caret-down"></i>
              </button>
              <ul class="button-dropdown-list">
                <li><a href="{{ URL::action('OrganizationController@edit', ['id' => $org->id]) }}">{{ trans('org.edit') }}</a></li>
                <li><a href="{{ URL::action('OrganizationController@show_resumes', ['id' => $org->id]) }}">{{ trans('org.view_resumes') }}</a></li>
              </ul>
            </span>

            @endif
            @endif
          </div>
        </p>
      </div>
  </div>
</div>

<div class="@if($wide) col-md-6 @else col-md-4 @endif col-sm-6 col-xs-12">

  <div class="panel">
    <div class="panel-body">
      <div class="media">
        <div class="media-left">
          @if($org->file_id)
          <img src="http://188.166.151.67:82/image/114" width="96" alt="...">
          @endif
        </div>
        <div class="media-body">
          <h4 class="media-heading">
            <a href="{{ url('org', $org->id) }}">{{ $org->organization_name }}</a>
            <!-- <small><span class="label label-default">Primary</span></small> -->
          </h4>

          <p class="hideoverflow"><small>{{ $org->organization_intro }}</small></p>
          @if(Auth::check())
          @if(Auth::id() == $org->user_id)
          <p>
                <a class="btn btn-sm btn-link" href="{{ URL::action('OrganizationController@edit', ['id' => $org->id]) }}">{{ trans('org.edit') }}</a>
                <a class="btn btn-sm btn-link" href="{{ URL::action('OrganizationController@show_resumes', ['id' => $org->id]) }}">{{ trans('org.view_resumes') }}</a>
          </p>
          @endif
          @endif
        </div>
      </div>
    </div>
  </div>

</div>

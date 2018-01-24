{{-- <div class="@if($wide) col-md-6 @else col-md-4 @endif col-sm-6 col-xs-12"> --}}


  <div class="card  bg-dark text-white" style="min-height: 250px;">
    @if($org->file_id)
    <img class="card-img-top"  style="opacity: 0.2;" src="/image/{{ $org->file_id }}" alt="Card image cap">
    @endif
    <div class="card-img-overlay">
    <h5 class="card-title"><a class="a-dark" href="{{ url('org', $org->id) }}">{{ $org->organization_name }}</a></h5>
    <p class="card-texgt"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $org->user->name }}</p>
    <p class="card-text"><small class="hideoverflow">{{ $org->organization_intro }}</small></p>

          @if(Auth::check())
          @if(Auth::id() == $org->user_id)
                <a class="btn btn-sm btn-default" href="{{ URL::action('OrganizationController@edit', ['id' => $org->id]) }}">{{ trans('org.edit') }}</a>
                <a class="btn btn-sm btn-default" href="{{ URL::action('OrganizationController@show_resumes', ['id' => $org->id]) }}">{{ trans('org.view_resumes') }}</a>
          @endif
          @endif

    </div>
  </div>

{{-- </div> --}}

<div class="ui blue segment raised">
  <div class="ui grid">
    <div class="four wide column">
      <img class="ui medium circular image" src="/image/{{ $org->file_id }}">
    </div>
    <div class="twelve wide column">
      <h3><a href="{{ url('org', $org->id) }}">{{ $org->organization_name }}</a></h3>
      <p class="content-preview">{{ $org->organization_intro }} </p>
      <a class="ui primary button" href="{{ url('org', $org->id) }}">
        关注我们
        <i class="right plus icon"></i>
      </a>
    </div>
  </div>
</div>

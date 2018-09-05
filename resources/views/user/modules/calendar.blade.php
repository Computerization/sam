
<div class="ui container">
  <!-- <div class="twelve wide column centered"> -->
    <div class="" id="calendar">

    </div>
  <!-- </div> -->
</div>

<script type="text/javascript">


  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      // defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: false, // allow "more" link when too many events
      events: [
        @foreach($user->organizations as $org)
        @foreach($org->articles()->where('content_type', config('organization.content_type.TODO'))->get() as $todo)
        {
          title: '{{ $todo->title }}',
          url: '{{ URL::action("ArticleController@show", ["id" => $todo->id]) }}',
          start: '{{ $todo->start_at }}',
          end: '{{ $todo->end_at }}',
        },
        @endforeach
        @endforeach
      ]
    });

  });

</script>

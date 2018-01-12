@php
  $question_json = json_decode($question->question_content, true);
@endphp

  <h4>{{ $question_json["title"] }}</h4>
  @foreach($question_json as $choice)
  @if(is_array($choice))
  <div class="radio">
    <label>
      @php
      $qcount = DB::table("answers")->where("question_id", $question->id)->where("answer_content", $choice["value"])->count()
      @endphp
      @if((!isset($choice["qcount"])) || (isset($choice["qcount"]) && $qcount <= $choice["qcount"])) <input type="radio" name="answer[{{ $question->id }}][answer_content]" value='{{ $choice["value"] }}' @if($question->answers->where('user_id',Auth::id())->count()>0) @if($question->answers->where('user_id',Auth::id())->first()->answer_content == $choice["value"]) checked @endif @endif> @else （已选满） @endif
      {{ $choice["content"] }} - {{ $qcount }}人已选@if(isset($choice["qcount"]))，共{{ $choice["qcount"]}}名额@endif
    </label>
  </div>
  @endif
  @endforeach
  <input type="hidden" name="answer[{{ $question->id }}][question_id]" value="{{ $question->id }}">

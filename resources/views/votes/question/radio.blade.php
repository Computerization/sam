@php
    $question_json = json_decode($question->question_content, true);
@endphp

<div class="grouped fields">
    <label style="font-size:1em;">{{ $question_json["title"] }}</label>
    @foreach($question_json as $choice)
        @if(is_array($choice))
            <div class="field">
                <div class="ui radio checkbox">
                    @php
                        $qcount = DB::table("answers")->where("question_id", $question->id)->where("answer_content", $choice["value"])->count()
                    @endphp
                    @if((!isset($choice["qcount"])) || (isset($choice["qcount"]) && $qcount <= $choice["qcount"])) <input type="radio" name="answer[{{ $question->id }}][answer_content]" value='{{ $choice["value"] }}' @if($question->answers->where('user_id',Auth::id())->count()>0) @if($question->answers->where('user_id',Auth::id())->first()->answer_content == $choice["value"]) checked @endif @endif> @else <label>（已选满）</label> @endif
                    <label>{{ $choice["content"] }} - {{ $qcount }}人已选@if(isset($choice["qcount"]))，共{{ $choice["qcount"]}}名额</label>@endif
                </div>
            </div>
        @endif
    @endforeach
</div>

<input type="hidden" name="answer[{{ $question->id }}][question_id]" value="{{ $question->id }}">

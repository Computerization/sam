<div class="field">
    <label for="q{{ $question->id }}" style="font-size:1em;">
        {{ $question->question_content }}
    </label>
    @if($question->answers->where('user_id',Auth::id())->count()>0)
        <input type="text" id="q{{ $question->id }}" name="answer[{{ $question->id }}][answer_content]" value="{{ $question->answers->where('user_id',Auth::id())->first()->answer_content }}">
    @else
        <input type="text" id="q{{ $question->id }}" name="answer[{{ $question->id }}][answer_content]">
    @endif
    <input type="hidden" name="answer[{{ $question->id }}][question_id]" value="{{ $question->id }}">
</div>

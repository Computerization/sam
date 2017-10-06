<h4>{{ $question->question_content }}</h4>
<div class="form-group">
  <label for="q{{ $question->id }}"></label>
  @if($question->answers->where('user_id',Auth::id())->count()>0)
  <input type="text" class="form-control" id="q{{ $question->id }}" name="answer[{{ $question->id }}][answer_content]" value="{{ $question->answers->where('user_id',Auth::id())->first()->answer_content }}">
  @else
  <input type="text" class="form-control" id="q{{ $question->id }}" name="answer[{{ $question->id }}][answer_content]">
  @endif
  <input type="hidden" name="answer[{{ $question->id }}][question_id]" value="{{ $question->id }}">
</div>

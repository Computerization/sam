@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if(Auth::user()->group >= 0)
            <a class="btn btn-lg btn-default" href="{{ url('/vote') }}">Back</a>
            @endif
            <h1>{{ $vote->vote_name }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <hr>
            <form class="" action="{{ URL::action('VoteController@submit',$vote->id) }}" method="post">
              {{ csrf_field() }}
              @foreach($vote->questions as $question)
              <div class="card">
                <div class="card-body">
                  @if($question->type == 1)
                    @include('votes.question.text')
                  @endif
                  @if($question->type == 2)
                    @include('votes.question.radio')
                  @endif
                </div>
              </div>
              <br>
              @endforeach
              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
            <br>
            <div class="col-sm-4 offset-sm-3" id="qrcode">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/qrcode.min.js') }}"></script>
<script type="text/javascript">
new QRCode(document.getElementById("qrcode"), "https://sam.swfla.org/vote/{{$vote->id}}");
</script>
@endsection

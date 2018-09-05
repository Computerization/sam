@extends('layouts.semantic')

@section('content')

    {{-- Successful Actions --}}
    @if (session('status'))
        <div class="ui text container blue message">
            <div class="header">
                <p>
                    <i class="info icon"></i>
                    {{ session('status') }}
                </p>
            </div>
        </div>
    @endif
    {{-- Errors detected --}}
    @if ($errors->any())
        <div class="ui text container error icon message">
            <i class="exclamation triangle icon"></i>
            <div class="content">
                <div class="header">
                    There were some errors with your submission
                </div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="ui raised padded text container segment">
        @if(Auth::user()->group >= 0)
            <a class="ui left labeled icon basic small button" href="javascript:history.back()">
                <i class="left arrow icon"></i>
                Back
            </a>
        @endif
        <div class="ui padded basic center aligned segment">
            <h1 class="ui header">{{ $vote->vote_name }}</h1>
        </div>
        <hr>
        <form class="ui form" action="{{ URL::action('VoteController@submit',$vote->id) }}" method="post">
            {{ csrf_field() }}
            @foreach($vote->questions as $question)
                @if($question->type == 1)
                    @include('votes.question.text')
                @endif
                @if($question->type == 2)
                    @include('votes.question.radio')
                @endif
            @endforeach
            <button type="submit" class="ui primary button">Submit</button>
        </form>
        <div class="ui divider"></div>
        <div class="ui center aligned basic segment">
            <p>您可将二维码分享给更多人参与投票</p>
            <div id="qrcode"></div>
        </div>

    </div>
    @endsection

    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/qrcode.min.js') }}"></script>
    <script type="text/javascript">
    new QRCode(document.getElementById("qrcode"), "https://sam.swfla.org/vote/{{$vote->id}}");
    </script>
@endsection

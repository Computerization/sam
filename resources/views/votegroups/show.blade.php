@extends('layouts.semantic')

@section('title'){{ $vote_group -> group_name }} @endsection

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

    <div class="ui raised padded text container segment">
        <div class="ui center aligned padded basic segment">
            <h1 class="ui header">
                {{ $vote_group -> group_name }}
            </h1>
            @if(Auth::user()->group > 0)
                <div class="ui divider"></div>
                <a class="ui positive button" href="{{ url('/group/create') }}">
                    New Vote Group...
                </a>
            @endif
            @if($vote_group -> description != null)
                <div class="ui divider"></div>
                <h4>Notice</h4>
                <div>
                    {{-- {!! !!} denotes <h4> contents --}}
                    {!! $vote_group -> description !!}
                </div>
            @endif
        </div>
        <hr />
        <div class="ui large very relaxed divided list">
            @foreach($vote_group->votes as $vote)
                <div class="item">
                    <i class="terminal icon"></i>
                    <div class="content">
                        <a href="{{ url('vote',$vote->id) }}">
                            {{ $vote->vote_name }}
                        </a>
                        <small class="description">
                            Created by {{ $vote->user->name }} at {{ $vote->created_at }}
                        </small>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

@endsection

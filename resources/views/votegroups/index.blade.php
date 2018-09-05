@extends('layouts.semantic')

@section('title')Vote Groups - @endsection

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

        <div class="ui padded basic center aligned segment">
            <h1 class="ui header">Vote Groups</h1>
            @if(Auth::user()->group > 0)
                <div class="ui divider"></div>
                <a class="ui positive button" href="{{ url('/group/create') }}">
                    New Vote Group...
                </a>
            @endif
        </div>
        <hr />
        <div class="ui large very relaxed divided list">
            @foreach($vote_groups as $vote_group)
                <div class="item">
                    <i class="terminal icon"></i>
                    <div class="content">
                        <a href="{{ URL::action('VoteGroupController@show',['id'=>$vote_group->id]) }}">
                            {{ $vote_group->group_name }}
                        </a>
                        <small class="description">
                            Created by {{ $vote_group->user->name }} at {{ $vote_group->created_at }}
                        </small>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

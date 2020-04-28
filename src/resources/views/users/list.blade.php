@extends('layouts.app')

@section('content')
@include('layouts.nav')
    @isset($list)
    <div class="container">
        <ul class="list-group">
        @foreach($list as $user)
            <li class="list-group-item">
                <a href="{{ route('user.show', $user->login_id) }}">{{ $user->name }}</a>
                @if($user->login_id !== Auth::user()->login_id)
                    <div>
                        <follow-button
                            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                            endpoint="{{ route('user.follow', ['login_id' => $user->login_id]) }}"
                        ></follow-button>
                    </div>
                @endif
            </li>
        @endforeach
        </ul>
    </div>
    @endisset
@endsection

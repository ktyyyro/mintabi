@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div>
                <img src="{{ asset('/storage/'.$user->icon_image_paths) }}">
            </div>
            <p>{{ $user->login_id }}</p>
            <p>{{ $user->name }}</p>
            <p>{{ $user->coments }}</p>
            <p>
                <a href="{{ route('user.following', ['login_id' => $user->login_id]) }}">フォロー</a>
                <a href="{{ route('user.followers', ['login_id' => $user->login_id]) }}">フォロワー</a>
            </p>
            @if($user->login_id === Auth::user()->login_id)
                <a href="{{ route('user.edit', $user->login_id) }}">情報変更</a>
            @endif
            @if($user->login_id !== Auth::user()->login_id)
                <follow-button
                    :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                    endpoint="{{ route('user.follow', ['login_id' => $user->login_id]) }}"
                ></follow-button>
            @endif
        </div>
        <div class="col-md-4">
            @isset($books)
                @foreach ($books as $book)
                    @include('travel_brochure.card')
                @endforeach
            @endisset
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection

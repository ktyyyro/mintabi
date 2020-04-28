@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div>
                <img src="{{ asset('/storage/'.$user->icon_image_paths) }}">
            </div>
            {{ $user->login_id }}
            {{ $user->name }}
            {{ $user->coments }}
            <a href="{{ route('user.edit', $user->login_id) }}">情報変更</a>
            @if($user->login_id !== Auth::user()->login_id)
                <follow-button></follow-button>
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

@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.search') }}" method="post">
                        @csrf
                        <div>
                            <p>ユーザーID</p>
                            <input class="form-control" type="text" placeholder="user id" name="login_id">
                        </div>
                        <button class="btn btn-primary">検索</button>
                    </form>
                </div>
            </div>
        </div>
        @isset($users)
        <div class="container">
            <ul class="list-group">
            @foreach($users as $user)
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
    </div>
</div>
@endsection

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
                            <input class="form-control" type="text" placeholder="user name" name="name">
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
                    {{ $user->name }}
                    @if($user->name !== Auth::user()->name)
                        <div>
                            <follow-button
                                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                                endpoint="{{ route('user.follow', ['name' => $user->name]) }}"
                            ></follow-button>
                        </div>
                    @endif
                    {{-- <button class="btn btn-outline-primary pull-right">フォローする</button> --}}
                </li>
            @endforeach
            </ul>
        </div>
        @endisset
    </div>
</div>
@endsection

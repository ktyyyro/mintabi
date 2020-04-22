@extends('layouts.app')

@section('content')
@include('layouts.nav')
{{-- <nav-bar></nav-bar> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>

                <div class="card-body">
                    <a href="{{ route('travel_brochure.create') }}">しおり作成</a>
                    <a href="">友達検索</a>
                    <a href="{{ route('travel_brochure.index') }}">しおり一覧</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

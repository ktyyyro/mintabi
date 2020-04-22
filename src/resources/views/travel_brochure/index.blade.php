@extends('layouts.app')
@section('title', 'しおり一覧画面')
@section('content')
@include('layouts.nav')
    @isset($books)
        @foreach ($books as $book)
            <div class="container">
                @include('travel_brochure.card')
            </div>
        @endforeach
    @endisset
@endsection

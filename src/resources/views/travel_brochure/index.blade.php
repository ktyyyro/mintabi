@extends('layouts.app')
@section('title', 'しおり一覧画面')
@section('content')
@include('layouts.nav')
    @isset($books)
        @foreach ($books as $book)
            <card-component
                href='/mypage'
                title="{{ $book->destination }}"
                remark="{{ $book->remark }}"
            ></card-component>
        @endforeach
    @endisset
@endsection

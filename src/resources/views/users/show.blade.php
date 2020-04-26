@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-4">
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

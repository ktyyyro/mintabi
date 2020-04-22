@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">

                <div class="card-body">
                    <div>
                        <a href="{{ route('travel_brochure.create') }}">しおり作成</a>
                    </div>
                    <div>
                        <a href="">友達検索</a>
                    </div>
                </div>
            </div>
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

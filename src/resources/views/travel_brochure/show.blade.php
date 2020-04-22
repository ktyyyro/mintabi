@extends('layouts.app')

@section('title', 'しおり詳細')

@section('content')
@include('layouts.nav')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body d-flex flex-row">
                <div class="card-body pt-0">
                    <h3 class="h4 card-title">
                        <p>{{ $travel_brochure->destination }}</p>
                    </h3>
                <div class="card-text">
                    <p class="card-text">{{ $travel_brochure->remark }}</p>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

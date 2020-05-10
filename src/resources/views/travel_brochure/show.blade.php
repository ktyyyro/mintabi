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
                    <div>
                        @isset($travel_brochure->image_paths)
                            <img src="{{ asset('/storage/'.$travel_brochure->image_paths) }}" style="height: 20%; width:100%;">
                        @endisset
                    </div>
                    <div>
                        <p>{{ $travel_brochure->travel_items }}</p>
                    </div>
                    @if(!$members->isEmpty())
                    <div>
                        <p>参加メンバー</p>
                        @foreach($members as $member)
                            <p>{{ $member->name }}</p>
                        @endforeach
                    </div>
                    @endif
                <div class="card-text">
                    <p class="card-text">{{ $travel_brochure->remark }}</p>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

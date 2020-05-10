@extends('layouts.app')
@section('title', 'しおり作成画面')

@section('content')
@include('layouts.nav')
<div class="container">
    <form action="{{ route('travel_brochure.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <p>行き先</p>
                <input type="text" class="form-control" name="destination">

                <div class="form-group">
                    <label class="control-label">参加メンバー</label>
                    @foreach($users as $user)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="members[]" id="member-check-{{ $loop->index }}" value="{{ $user->id }}">
                            <label class="custom-control-label" for="member-check-{{ $loop->index }}">{{ $user->name }}</label>
                        </div>
                    @endforeach
                </div>

                <p>日付</p>
                <div>
                    <select class="custom-select" name="date_Y" id="">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        </select>年
                    <select class="custom-select" name="date_M" id="">
                        <option value="1">1</option>
                        <option value="4">4</option>
                        <option value="9">9</option>
                        </select>月
                    <select class="custom-select" name="date_D" id="">
                        <option value="1">1</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        </select>日
                </div>
                <p>持ち物</p>
                <input class="form-control" type="text" name="travel_items">
                <p>しおりトップ画像</p>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label" for="image" data-browse="参照"></label>
                </div>
                <p>備考</p>
                <textarea class="form-control" name="remark" id="" cols="30" rows="10"></textarea>
                <button class="btn btn-default">しおり作成</button>
            </div>
        </div>
    </form>
</div>

@endsection

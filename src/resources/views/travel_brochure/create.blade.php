@extends('layouts.app')
@section('title', 'しおり作成画面')

@section('content')
@include('layouts.nav')
<div class="container">
    <form action="{{ route('travel_brochure.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <p>行き先</p>
                <input type="text" name="destination">
                <p>日付</p>
                <div>
                    <select name="date_Y" id="">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        </select>年
                    <select name="date_M" id="">
                        <option value="1">1</option>
                        <option value="4">4</option>
                        <option value="9">9</option>
                        </select>月
                    <select name="date_D" id="">
                        <option value="1">1</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        </select>日
                </div>
                <p>持ち物</p>
                <input type="text" name="travel_items">
                <p>備考</p>
                <textarea name="remark" id="" cols="30" rows="10"></textarea>
                <button class="btn btn-default">作成内容確認</button>
            </div>
        </div>
    </form>
</div>

@endsection

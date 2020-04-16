@extends('layouts.app')

@include('layouts.nav')
<form action="">
    @csrf
    <div class="card">
        <div class="card-body">
            <p>行き先</p>
            <input type="text" name="destination">
            <p>メンバー</p>
            <input type="text">
            <p>日付</p>
            <div>
                <select name="date_Y" id=""></select>年
                <select name="date_M" id=""></select>月
                <select name="date_D" id=""></select>日
            </div>
            <p>持ち物</p>
            <input type="text" name="travel_items">
            <p>備考</p>
            <textarea name="remark" id="" cols="30" rows="10"></textarea>
            <button>登録</button>
        </div>
    </div>
</form>

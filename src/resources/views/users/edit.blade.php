@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <p>表示名</p>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                <p>コメント</p>
                <input type="textarea" class="form-control" name="coments" value="{{ $user->coments }}">
                <p>アイコン画像</p>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="icon_data">
                    <label class="custom-file-label" for="icon_data" data-browse="参照"></label>
                </div>
                <button class="btn primary">変更する</button>
            </form>
        </div>
    </div>
</div>
@endsection

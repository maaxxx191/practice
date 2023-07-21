@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            学生詳細画面
            <a href="{{ url('/student/edit') }}">学生編集</a>
            <a href="{{ url('/student/grades') }}">成績追加</a>
            <a href="{{ url('/student/edit-grades') }}">成績編集</a>

        </div>
    </div>
</div>
@endsection

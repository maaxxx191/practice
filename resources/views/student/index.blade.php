@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            学生表示画面
          <a href="{{ url('/student/detail') }}">詳細</a>   
        </div>
    </div>
</div>
@endsection

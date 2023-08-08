@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('flash_message'))
        <div class="alert alert-success w-20 col-md-8 mx-md-auto" role="alert">
            {{ session('flash_message') }}
        </div>
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> -->

            <div class="form-group row mb-0 justify-content-center">
                <form method="POST" action="{{ url('/grade-update') }}"> 
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">
                        学年更新
                    </button>
                </form>
                <button type="button" class="btn btn-success btn-lg mx-5" onclick="location.href='{{ url('student/register') }}'">
                    学生登録
                </button>
                <button type="button" class="btn btn-success btn-lg" onclick="location.href='{{ url('/student') }}'">
                    学生表示
                </button>
             </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('flash_message'))
        <div class="alert alert-success w-20 col-md-8 mx-md-auto" role="alert">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">学生登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/student/register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">顔写真</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" >

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0 justify-content-center">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  登録
                              </button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
              <a href="{{ url('/home') }}">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection

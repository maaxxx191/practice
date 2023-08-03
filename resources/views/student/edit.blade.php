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
                <div class="card-header">学生編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('student/'.$student->id.'/edit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                          <label for="student-id" class="col-md-2 col-form-label">学生ID</label>
                          <div class="col-md-6 d-flex align-items-center">{{ $student->id }}</div>
                        </div>


                        <div class="form-group row">
                            <label for="grade" class="col-md-2 col-form-label">学年</label>

                            <div class="col-md-2">
                                <select class="custom-select" id="grade" name="grade">
                          
                                    @for ($i = 1; $i < 4; $i++)
                                        <option value="{{ $i }}" @if($student->grade == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                              {{-- <option selected value="1">1年</option>
                              <option value="2">2年</option>
                              <option value="3">3年</option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label">住所</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $student->address }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-2 col-form-label">顔写真</label>

                            <div class="col-md-6">
                                <img src="{{ asset($student->img_path) }}" width="80" class="mb-2">
                                <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" >
                                
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="textarea">コメント</label>
                          <textarea id="textarea" class="form-control" name="comment">{{ $student->comment }}</textarea>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                          <button type="submit" class="btn btn-info">
                            編集
                          </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
              <a href="{{ url('student/'.$student->id) }}">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
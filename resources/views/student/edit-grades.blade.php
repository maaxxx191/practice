@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">成績編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="grade" class="col-md-2 col-form-label">学年</label>

                            <div class="col-md-2">
                                <select class="custom-select" id="grade">
                          
                                    @for ($i = 1; $i < 4; $i++)
                                        <option value="{{ $i }}" @if($array['grade'] == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="term" class="col-md-2 col-form-label">学期</label>

                            <div class="col-md-2">
                                <select class="custom-select" id="term">
                          
                                    @for ($i = 1; $i < 4; $i++)
                                        <option value="{{ $i }}" @if($array['term'] == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group row col">
                                <label for="japanese" class="col-md-4 col-form-label text-md-center">国語</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="japanese">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['japanese'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col">
                                <label for="math" class="col-md-4 col-form-label text-md-center">数学</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="math">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['math'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col">
                                <label for="science" class="col-md-4 col-form-label text-md-center">理科</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="science">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['science'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        </div>   
                        
                        <div class="form-row">
                            <div class="form-group row col">
                                <label for="socialstudies" class="col-md-4 col-form-label text-md-center">社会</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="socialstudies">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['socialstudies'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col">
                                <label for="music" class="col-md-4 col-form-label text-md-center">音楽</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="music">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['music'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col">
                                <label for="homeeconomics" class="col-md-4 col-form-label text-md-center">家庭科</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="homeeconomics">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['homeeconomics'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        </div> 

                        <div class="form-row">
                            <div class="form-group row col">
                                <label for="english" class="col-md-4 col-form-label text-md-center">英語</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="english">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['english'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col">
                                <label for="art" class="col-md-4 col-form-label text-md-center">美術</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="art">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['art'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row col">
                                <label for="health_and_physical_education" class="col-md-4 col-form-label col-form-label-sm text-md-center my-md-auto">保健体育</label>

                                <div class="col-md-6">
                                    <select class="custom-select" id="health_and_physical_education">
                            
                                        @for ($i = 1; $i < 6; $i++)
                                            <option value="{{ $i }}" @if($array['health_and_physical_education'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                        </div> 
     
                        <div class="form-group row mb-0 justify-content-center">
                            <button type="button" class="btn btn-info">
                              編集
                            </button>
                          </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
              <a href="{{ url('/student/detail') }}">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection

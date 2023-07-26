@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>学生表示</h1>

            <form>
                <div class="form-group row">
                  <label for="StudentName" class="col-md-2 col-form-label">学生名</label>
                  <div class="col-md-5">
                    <input type="name" class="form-control" id="StudentName">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="grade" class="col-md-2 col-form-label">学年</label>
                    <div class="col-md-2">
                        <select class="custom-select" id="grade">
                            @for ($i = 1; $i < 4; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary">
                        検索
                    </button>
                </div>

            </form>

            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">学年</th>
                        <th scope="col">名前</th>
                        <th scope="col">詳細表示</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $student["grade"] }}</th>
                            <td>{{ $student["name"] }}</td>
                            <td><button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/student/detail') }}'">詳細表示</button></td>
                        </tr>
                    @endforeach
                 </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="{{ url('/home') }}">戻る</a>
            </div>

        </div>
    </div>
</div>
@endsection

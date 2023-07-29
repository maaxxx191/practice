@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <h5>学生情報</h5>

            <table class="table table-bordered">
                <tr>
                    <th scope="row" class="bg-info">学年</th>
                    <td>{{ $student->grade }}</td>
                </tr>
                <tr>
                    <th scope="row" class="bg-info">名前</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th scope="row" class="bg-info">住所</th>
                    <td colspan="2">{{ $student->address }}</td>
                </tr>
                <tr>
                    <th scope="row" class="bg-info">顔写真</th>
                    <td>画像</td>
                </tr>
            </table>

            <button type="button" class="btn btn-outline-secondary mb-5" onclick="location.href='{{ url('/student/edit') }}'">
                学生編集
            </button>

            <h5>成績情報</h5>

            @foreach ($grades as $grade)
                <div class="d-flex flex-row">
                    <h3 class="mr-2"><span class="badge badge-dark">{{ $grade->grade }}年</span></h3>
                    <h3><span class="badge badge-success">{{ $grade->term }}学期</span></h3>
                </div>

                <table class="table table-bordered" style="table-layout: fixed">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">国語</th>
                            <th scope="col">数学</th>
                            <th scope="col">理科</th>
                            <th scope="col">社会</th>
                            <th scope="col">英語</th>
                            <th scope="col">音楽</th>
                            <th scope="col">家庭科</th>
                            <th scope="col">美術</th>
                            <th scope="col">保健体育</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $grade->japanese }}</td>
                            <td>{{ $grade->math }}</td>
                            <td>{{ $grade->science }}</td>
                            <td>{{ $grade->social_studies }}</td>
                            <td>{{ $grade->music }}</td>
                            <td>{{ $grade->home_economics }}</td>
                            <td>{{ $grade->english }}</td>
                            <td>{{ $grade->art }}</td>
                            <td>{{ $grade->health_and_physical_education }}</td>
                        </tr>
                    </tbody>
                </table>

                <div>
                    <button type="button" class="btn btn-outline-secondary mb-5" onclick="location.href='{{ url('/grade/edit') }}'">
                        成績編集
                    </button>
                </div>
            @endforeach

            <div>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/grade/1/add') }}'">
                    成績登録
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/student') }}">戻る</a>
            </div>

        </div>
    </div>
</div>
@endsection

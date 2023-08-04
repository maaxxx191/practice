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
                    <td><img src="{{ asset($student->img_path) }}" width="100"></td>
                </tr>
            </table>
            <div class="d-flex mb-5">
                <button type="button" class="btn btn-outline-secondary mr-3" onclick="location.href='{{ url('student/'.$student->id.'/edit') }}'">
                    学生編集
                </button>
                <form method="POST" action="{{ url('student/'. $student->id.'/destroy') }}" name="studentForm"> 
                    @csrf
                    <button type="button" class="btn btn-secondary" onclick="dispConfirm();">
                        学生削除
                    </button>
                </form>
            </div>

            <h5>成績情報</h5>
                <form action="{{ url('student/'. $student->id) }}">
                    <div class="form-group row">
                        <label for="grade" class="col-md-2 col-form-label">学年</label>
                        <div class="col-md-2">
                            <select class="custom-select" id="grade" name="grade">
                                @for ($i = 1; $i < 4; $i++)
                                    <option value="{{ $i }}" @if($grade == $i) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="term" class="col-md-2 col-form-label">学期</label>
                        <div class="col-md-2">
                            <select class="custom-select" id="term" name="term">
                                @for ($i = 1; $i < 4; $i++)
                                    <option value="{{ $i }}" @if($term == $i) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            検索
                        </button>
                    </div>
                </form>  

                @if ($school_grade)
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
                                <td>{{ $school_grade->japanese }}</td>
                                <td>{{ $school_grade->math }}</td>
                                <td>{{ $school_grade->science }}</td>
                                <td>{{ $school_grade->social_studies }}</td>
                                <td>{{ $school_grade->music }}</td>
                                <td>{{ $school_grade->home_economics }}</td>
                                <td>{{ $school_grade->english }}</td>
                                <td>{{ $school_grade->art }}</td>
                                <td>{{ $school_grade->health_and_physical_education }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div>
                        <button type="button" class="btn btn-outline-secondary mb-5" onclick="location.href='{{ url('grade/'.$school_grade->id.'/edit') }}'">
                            成績編集
                        </button>
                    </div>
                @endif
                <div>
                    <button type="button" class="btn btn-outline-secondary" onclick="location.href='{{ url('grade/'.$student->id.'/add') }}'">
                        成績追加
                    </button>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('/student') }}">戻る</a>
                </div>

        </div>
    </div>
</div>
<script>
    function dispConfirm() {
        let result = confirm('削除しますか');
        if (result) {
            document.studentForm.submit();
        } 
    }                  
</script>
@endsection

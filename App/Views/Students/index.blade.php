@extends('main')

@section('css')
<link rel="stylesheet" href="./Core/Src/Css/students.css">
@endsection

@section('title')
    {{$Title}}
@endsection


@component('Modal.StudentAdd')

@endcomponent
@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 60px;">
        <div class="col-12 pt-4 card my-4 shadow">
            <div class="card-body pt-0">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                    <button class="btn btn-light mr-3 px-2" style="line-height: 0px;" onclick="ReturnPage()">
                        <i class="fa fa-angle-left"></i>
                        </button>
                        <h3 class="mb-0 class-name">{{$ClassName}} Sınıfının Öğrencileri ({{$ClassCount>0?$ClassCount:'0'}})</h3>
                    </div>
                    <button type="button" class="btn btn-primary" style="margin-left:40%;" onclick="ChangeResult('addStudent')">Öğrenci Ekle</button>
                    <button type="button" class="btn btn-primary">Çıktı Al</button>
                </div>
                <hr class="mt-3">
                @if (empty($Students))
                    <div class="alert alert-warning">
                        <strong>Henüz Burada Bir Öğrenci Bulamadık</strong>
                        <br>
                        <small>Öğrenci Eklemek için sağ üstteki Öğrenci Ekle butonunu kullanabilirsiniz
                        </small>
                    </div>
                @else
                    @component('Modal.TableStudents')
                        @slot('Students',$Students)
                    @endcomponent
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="./Core/Src/Js/Custom/ButtonActivity/Activity.js"></script>
    <script src="./Core/Src/Js/Custom/ButtonActivity/ReturnPage.js"></script>
    <script src="./Core/Src/Js/Custom/Ajax/AddStudent.js"></script>
@endsection
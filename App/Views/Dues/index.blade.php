@extends('main')

@section('css')
<link rel="stylesheet" href="./Core/Src/Css/students.css">
@endsection

@section('title')
    {{$Title}}
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 60px;">
        <div class="col-12 pt-4 card my-4 shadow">
            <div class="card-body pt-0">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <h3 class="mb-0 class-name">Aidat Vermeyen Öğrenciler (@if(!empty($Students)){{count($Students)}}@else 0 @endif)</h3>
                    </div>
                    @if(!empty($Months))
                    <div class="d-flex">
                        <select class="form-control" id="switch-mounth" style="max-width: 170px;margin-left: 15px;">
                            @foreach ($Months as $item)
                                @if($item == $SelectedMonth)
                                <option value="./unpaidDues?se={{$SeasonId}}&mo={{$item}}" selected>{{$item}}</option>

                                @else
                                <option value="./unpaidDues?se={{$SeasonId}}&mo={{$item}}">{{$item}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>
                <hr class="mt-3">
                @if(!empty($Students))
                    @component('Modal.TableStudents')
                        @slot('Students',$Students)
                    @endcomponent
                @else
                    <div class="alert alert-warning">
                        <strong>Henüz Burada Bir Öğrenci Bulamadık</strong>
                        <br>
                        <small>Ne kadar şanslı bir ay</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="./Core/Src/Js/Custom/ButtonActivity/ChangeMonths.js"></script>
@endsection
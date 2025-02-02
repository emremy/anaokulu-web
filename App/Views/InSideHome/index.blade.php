@extends('main')

@section('title')
    {{$Title}}
@endsection



@section('content')
    @component('Modal.PeriodAdd')
    @endcomponent
    @component('Modal.ClassAdd')
    @endcomponent
    @component('Modal.ClassDelete')
        @slot('DeleteClasses',$Classes)
        @slot('ConfirmSeason',$SeasonId)
    @endcomponent
<div class="container">
    <div class="row" style="margin-bottom: 80px;">
        <div class="col-12 pt-4 card my-4 shadow">
            <div class="card-body pt-0 pb-4">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <h3 class="mb-0">Sınıflar</h3>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" onclick="ChangeResult('period')">Dönem Ekle</button>
                        @if (!empty($Season))
                        <button type="button" class="ml-2 btn btn-primary" onclick="ChangeResult('class')">Sınıf Ekle</button>
                        @endif
                        @if (!empty($Classes))
                        <button type="button" class="ml-2 btn btn-danger" onclick="ChangeResult('deleteClass')">Sınıf Sil</button>
                        @endif
                    </div>
                </div>
                <hr class="mt-3">
                @component('Modal.ChangeSeason')
                    @slot('Season',$Seasons)
                    @slot('SelectedSeason',$Season)
                @endcomponent

                <div class="classes d-flex flex-wrap mt-3 list-cls">
                    @if(!empty($Classes))
                    @foreach ($Classes as $item)
                        <div class="card single-class bg-light col-4" >
                            <div class="card-body d-flex align-items-center justify-content-center flex-column">
                                <h4 class="card-title text-center list-class-h">{{$item['class_name']}}</h4>
                                <a href="./students?s={{$SeasonId}}&c={{$item['public_id']}}" class="mt-2 w-50 btn btn-primary">Sınıfa Bak</a>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                @if(empty($Classes))
                <div class="alert alert-warning">
                    <strong>Henüz Burada Bir Sınıf Bulamadık</strong><br>
                    <small>Sınıfları görüntülemek için dönem seçiniz, eğer dönem seçtikten sonra </small>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="./Core/Src/Js/Custom/ButtonActivity/Activity.js"></script>
    <script src="./Core/Src/Js/Custom/Ajax/AddPeriod.js"></script>
    <script src="./Core/Src/Js/Custom/Ajax/AddClass.js"></script>
    <script src="./Core/Src/Js/Custom/Ajax/DeleteClass.js"></script>
@endsection
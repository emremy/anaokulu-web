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
                        <button type="button" class="ml-2 btn btn-primary" onclick="ChangeResult('class')">Sınıf Ekle</button>
                        <button type="button" class="ml-2 btn btn-danger" onclick="ChangeResult('deleteClass')">Sınıf Sil</button>
                    </div>
                </div>
                <hr class="mt-3">
                @component('Modal.ChangeSeason')
                    @slot('Season',$Seasons)
                @endcomponent

                <div class="classes d-flex flex-wrap mt-3 list-cls">
                    @if(!empty($Class))
                    <div class="card single-class bg-light col-4 list-classes lists" >
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <h4 class="card-title text-center list-class-h"></h4>
                            <a href="./class?_Cls=3-A" class="mt-2 w-50 btn btn-primary list-class-a">Sınıfa Bak</a>
                        </div>
                    </div>
                    @endif
                </div>
                @if(empty($Class))
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
    <script src="./Core/Src/Js/ButtonActivity/ChangeActivity.js"></script>
    <script src="./Core/Src/Js/Ajax/AddPeriod.js"></script>
@endsection
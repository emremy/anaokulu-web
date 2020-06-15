@extends('main')

@section('css')
<link rel="stylesheet" href="./Core/Src/Css/student.css">
@endsection

@section('title')
    {{$Title}}
@endsection
@section('content')
<div class="container">
<div class="row" style="margin-bottom: 80px;">
    <div class="col-6 pt-4 card mt-4 shadow">
      <div class="card-body pt-0">
          <div class="d-flex justify-content-between">
              <h4 class="mb-0">Öğrenci Bilgileri</h4>
          </div>
          <hr class="mt-3">

          <div class="form-group ogrenci-bul">
              <label style="margin-bottom: 15px;">Öğrenci İsmi:</label>
              <div class="ogrenci-getir">
                  <input type="text" class="form-control" placeholder="İsim giriniz..." value="">
                  <button class="btn btn-primary">Bul</button>
              </div>
              <ul class="ogrenci-listesi list-group d-none">
                  <li v-for="index in 8" :key="index" class="list-group-item"></li>
              </ul>
          </div>
          <hr>
          @if(!empty($SingleStudent['Student']))
        <p style="line-height: 30px;"><span><strong class="mr-1">Adı Soyadı: </strong> {{$SingleStudent['Student']['name']}} {{$SingleStudent['Student']['surname']}}</span>
        <br><span><strong class="mr-1">Sınıfı:</strong> {{$SingleStudent['Class']}} </span><span class="ml-3"><strong class="mr-1">Dönemi: </strong>{{$SingleStudent['Season']}}</span></p>
        <form class="form-inline ogrenci-ekle-form">  
                    @component('Modal.EditStudent')
                        @slot('Student',$SingleStudent['Student'])
                    @endcomponent
                </form>

            @else
                <div class="alert alert-warning">
                    <strong>Henüz Burada Bir Öğrenci Bulamadık</strong>
                </div>
            @endif
          <hr class="my-2">
          @if(!empty($SingleStudent['Student']))
          <div class="mt-3">
              <button class="btn btn-danger" onclick="">Öğrenciyi Sil</button>
              <button class="btn btn-info float-right" onclick="ChangeResult('show-dues')">Aidat Göster</button>
              <button class="btn btn-primary float-right mr-2">Bilgileri Kaydet</button>
          </div>
          @endif
      </div>
  </div>
<div class="col-5 offset-1 pt-4 card mt-4 shadow dues-table" style="display:none;">
    <div class="card-body pt-0">
        <div class="d-flex justify-content-between">
            <h4 class="mb-0">Aidat Bilgisi:<span class="font-weight-normal ml-2"></span></h4>
        </div>
        <hr class="mt-3">
        <p><span><strong>{{$SingleStudent['Season']}}</strong></span><span class="ml-2">dönemi aidat bilgileri aşağıdaki gibidir.</span></p>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Ay</th>
                    <th>Ücret</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Eylül</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Ekim</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Kasım</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Aralık</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Ocak</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Şubat</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Mart</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Nisan</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Mayıs</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
                <tr class="single-aidat">
                    <td class="align-middle"><strong>Haziran</strong><span class="badge badge-info ml-2 edit-aidat"><i class="fa fa-edit"></i></span></td>
                    <td class="align-middle">200 TL</td>
                    <td class="align-middle">18 Eylül 2019</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>    
@endsection

@section('script')
    <script src="./Core/Src/Js/Custom/ButtonActivity/Activity.js"></script>
@endsection
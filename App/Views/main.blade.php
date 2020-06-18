<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="./Core/Src/Css/bootstrap.min.css">
    <link rel="stylesheet" href="./Core/Src/Css/font-awesome.css">
    <link rel="stylesheet" href="./Core/Src/Css/style.css">
    @yield('css')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #142c44;">
    <div class="container">
        <a class="navbar-brand" href="./">Aidat Takip Sistemi</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./student">Öğrenci Kontrol Et</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    @yield('content')
<nav class="navbar fixed-bottom  navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <span class="navbar-text mr-auto">
            <strong>Neriman Haşim Emirli Anaokulu</strong>  •  Çiğli, İzmir
        </span>
        <span class="navbar-text navbar-nav my-2 my-lg-0 mr-3">
            <strong>Öğrenci Sayısı : </strong>
            <span class="badge badge-success">{{$StudentCount}}</span>
        </span>
        @if(!empty($SeasonId))

                <span class="navbar-text navbar-nav my-2 my-lg-0 mr-3">
                    <a href="./unpaidDues?se={{$SeasonId}}&mo={{$Date}}" class="not-givin">
                        <strong>{{$Date}} Ayı Aidat Vermeyenler : </strong>
                        <span class="badge badge-primary">{{$DateCounter}}</span>
                    </a>
                    </span>

        @else
            <span class="navbar-text navbar-nav my-2 my-lg-0 mr-3">
                <strong>{{$Date}} Ayı Aidat Vermeyenler : </strong>
                <span class="badge badge-primary">{{$DateCounter}}</span>
            </span>
        @endif
        @component('Modal.ChangeSeason')
            @slot('Season',$Seasons)
            @slot('SelectedSeason',$Season)
        @endcomponent
    </div>
</nav>
</body>
<script src="./Core/Src/Js/bootstrap.min.js"></script>
<script src="./Core/Src/Js/Custom/ButtonActivity/ChangeSeason.js"></script>
    @yield('script')
</html>
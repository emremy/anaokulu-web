@extends('main')

@section('title')
    {{$Title}} | Sayfa Hatası
@endsection

@section('content')
    <p>{{$Message}}</p>
@endsection

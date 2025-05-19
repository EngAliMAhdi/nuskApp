@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        المركبات</a>
@endsection
@section('main_title_content', ' قائمة المركبات ')
@section('title_content', 'عرض')

@section('content')
    @livewire('vehicle-page')
@endsection
@section('script')

@endsection

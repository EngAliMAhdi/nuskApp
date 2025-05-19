@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        السائقين</a>
@endsection
@section('main_title_content', ' قائمة السائقين ')
@section('title_content', 'عرض')

@section('content')
    @livewire('driver-page')
@endsection
@section('script')

@endsection

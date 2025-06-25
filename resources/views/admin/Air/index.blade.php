@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        النقل الجوي </a>
@endsection
@section('main_title_content', ' قائمة النقل الجوي ')
@section('title_content', 'عرض')

@section('content')
    @livewire('air-page')
@endsection
@section('script')

@endsection

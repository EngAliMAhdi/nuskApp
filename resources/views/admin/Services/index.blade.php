@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        خدمات أخرى</a>
@endsection
@section('main_title_content', ' قائمة الخدمات الأخرى ')
@section('title_content', 'عرض')

@section('content')
    @livewire('services-page')
@endsection
@section('script')

@endsection

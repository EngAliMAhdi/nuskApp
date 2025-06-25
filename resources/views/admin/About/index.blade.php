@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        من نحن</a>
@endsection
@section('main_title_content', ' قائمة من نحن ')
@section('title_content', 'عرض')

@section('content')
    @livewire('about-page')
@endsection
@section('script')

@endsection

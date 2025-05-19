@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الفنادق</a>
@endsection
@section('main_title_content', ' قائمة الفنادق ')
@section('title_content', 'أضافة')

@section('content')
    @livewire('hotel-form')


@endsection
@section('script')

@endsection

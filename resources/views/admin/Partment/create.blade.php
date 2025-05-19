@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الشقق</a>
@endsection
@section('main_title_content', ' قائمة الشقق ')
@section('title_content', 'أضافة')

@section('content')
    @livewire('partment-form')


@endsection
@section('script')

@endsection

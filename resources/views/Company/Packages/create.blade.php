@extends('layouts.main1')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الباقات</a>
@endsection
@section('main_title_content', ' قائمة الباقات ')
@section('title_content', 'أضافة')

@section('content')
    @livewire('package-form')


@endsection
@section('script')

@endsection

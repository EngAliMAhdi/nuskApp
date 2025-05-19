@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        وسائل النقل البري</a>
@endsection
@section('main_title_content', ' قائمة النقل البري ')
@section('title_content', 'أضافة')

@section('content')
    @livewire('transport-form')


@endsection
@section('script')

@endsection

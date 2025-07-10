@extends('layouts.main1')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الحجوزات</a>
@endsection
@section('main_title_content', ' الحجوزات ')
@section('title_content', 'عرض')

@section('content')
    @livewire('booking-page')
@endsection
@section('script')

@endsection

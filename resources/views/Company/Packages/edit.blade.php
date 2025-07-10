@extends('layouts.main1')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الفنادق</a>
@endsection
@section('main_title_content', ' قائمة الفنادق ')
@section('title_content', 'تعديل')

@section('content')
    @livewire('hotel-edit', ['id' => $id])

@endsection
@section('script')

@endsection

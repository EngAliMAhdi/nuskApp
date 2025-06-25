@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الباقات</a>
@endsection
@section('main_title_content', ' قائمة الباقات ')
@section('title_content', 'عرض')

@section('content')
    @livewire('package-page')
    {{-- model --}}

    {{-- End model --}}
@endsection
@section('script')

@endsection

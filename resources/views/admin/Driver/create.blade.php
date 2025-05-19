@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        السائقين</a>
@endsection
@section('main_title_content', ' قائمة السائقين ')
@section('title_content', 'أضافة')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>أضافة سائق</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- اسم السائق --}}
                            <div class="form-group col-md-6">
                                <label for="name">اسم السائق</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- اسم المرافق --}}
                            <div class="form-group col-md-6">
                                <label for="companion_name">اسم المرافق</label>
                                <input type="text" name="companion_name" class="form-control"
                                    value="{{ old('companion_name') }}">
                                @error('companion_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- اسم المرشد --}}
                            <div class="form-group col-md-6">
                                <label for="guide_name">اسم المرشد</label>
                                <input type="text" name="guide_name" class="form-control"
                                    value="{{ old('guide_name') }}">
                                @error('guide_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- العمر --}}
                            <div class="form-group col-md-6">
                                <label for="age">العمر</label>
                                <input type="number" name="age" class="form-control" value="{{ old('age') }}">
                                @error('age')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- العنوان --}}
                            <div class="form-group col-md-12">
                                <label for="address">العنوان</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- رقم الهاتف --}}
                            <div class="form-group col-md-6">
                                <label for="phone">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- رقم هاتف المرافق --}}
                            <div class="form-group col-md-6">
                                <label for="companion_phone">رقم هاتف المرافق</label>
                                <input type="text" name="companion_phone" class="form-control"
                                    value="{{ old('companion_phone') }}">
                                @error('companion_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- ملف رخصة القيادة --}}
                            <div class="form-group col-md-12">
                                <label for="license_file">رخصة القيادة (PDF / صورة)</label>
                                <input type="file" name="license_file" class="form-control">
                                @error('license_file')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-success">حفظ البيانات</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

@endsection

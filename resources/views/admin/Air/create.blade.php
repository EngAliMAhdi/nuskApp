@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        النقل الجوي </a>
@endsection
@section('main_title_content', ' قائمة النقل الجوي ')
@section('title_content', 'أضافة')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>أضافة طائرة</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('air.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- اسم السائق --}}
                            <div class="form-group col-md-6">
                                <label for="airplane">اسم الطائرة</label>
                                <input type="text" name="airplane" class="form-control" value="{{ old('airplane') }}"
                                    required>
                                @error('airplane')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- اسم المرافق --}}
                            <div class="form-group col-md-6">
                                <label for="flight_number"> رقم الطائرة</label>
                                <input type="text" name="flight_number" class="form-control"
                                    value="{{ old('flight_number') }}" required>
                                @error('flight_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- اسم المرشد --}}
                            <div class="form-group col-md-6">
                                <label for="available_seats">عدد المقاعد المتاحة </label>
                                <input type="text" name="available_seats" class="form-control"
                                    value="{{ old('available_seats') }}" required>
                                @error('available_seats')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- العمر --}}
                            <div class="form-group col-md-6">
                                <label for="booked_seats">عدد المقاعد المحجوزة</label>
                                <input type="number" name="booked_seats" class="form-control"
                                    value="{{ old('booked_seats') ?? 0 }}">
                                @error('booked_seats')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="airplane_image"> صورة الطائرة</label>
                                <input type="file" name="airplane_image" class="form-control">
                                @error('airplane_image')
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

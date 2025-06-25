@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        أنواع الباقات</a>
@endsection
@section('main_title_content', ' قائمة أنواع الباقات ')
@section('title_content', 'أضافة')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>أضافة نوع باقة</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('bouquet.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">اسم الباقة</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cost_price"> صورة </label>
                                <input type="file" name="image" class="form-control" required>

                            </div>
                            <div class="mb-3 form-group col-md-8">
                                <label class="form-label fw-bold">الوصف</label>
                                <textarea name="description" class="form-control form-control-sm" rows="2">{{ old('description') }}</textarea>
                                @error('description')
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

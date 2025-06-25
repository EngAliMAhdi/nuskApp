@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        خدمات أخرى</a>
@endsection
@section('main_title_content', ' قائمة الخدمات الأخرى ')
@section('title_content', 'تعديل')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>تعديل بيانات خدمة</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('services.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">اسم الخدمة</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $data->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cost_price"> سعر الكلفة </label>
                                <input type="number" name="cost_price" class="form-control"
                                    value="{{ old('cost_price', $data->cost_price) }}" required>
                                @error('cost_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sale_price">سعر البيع </label>
                                <input type="number" name="sale_price" class="form-control"
                                    value="{{ old('sale_price', $data->sale_price) }}" required>
                                @error('sale_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>

                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-success">تحديث البيانات</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

@endsection

@extends('layouts.admin')
@section('title', 'الفنادق ')
@section('main_title_content', ' قائمة الفنادق ')
@section('title_content', 'تعديل')
@section('link_content')
    <a href="{{ route('hotels.index') }}"> الفنادق</a>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center"> تعديل بيانات الفندق
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('hotels.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="updated_by" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for=""> اسم الفندق </label>
                            <input type="text" name="name" value="{{ old('name', $data->name) }}" class="form-control"
                                placeholder="">
                            @error('name')
                                <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""> المدينة</label>
                            <select class="form-control" name="city">
                                <option value="madina" {{ old('city', $data->city) == 'madina' ? 'selected' : '' }}>المدينة
                                </option>
                                <option value="makaa" {{ old('city', $data->city) == 'makaa' ? 'selected' : '' }}>
                                    مكة</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""> الصورة </label>
                            <input type="file" name="image" class="form-control" placeholder="">
                            @error('image')
                                <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                    </div>


                    <div class="text-center col-md-12">
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </div>

            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

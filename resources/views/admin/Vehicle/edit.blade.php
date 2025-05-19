@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        المركبات</a>
@endsection
@section('main_title_content', ' قائمة المركبات ')
@section('title_content', 'تعديل')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>تعديل بيانات المركبة</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('vehicles.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="name">اسم المركبة</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $data->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="number">نوع المركبة</label>
                                <select type="text" name="transport_id" class="form-control">
                                    <option value="">اختر النوعة</option>
                                    @foreach ($transport as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('transport_id', $data->transport_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="number">رقم المركبة</label>
                                <input type="text" name="number" class="form-control"
                                    value="{{ old('number', $data->number) }}">
                                @error('number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="color"> لون المركبة</label>
                                <input type="color" name="color" class="form-control"
                                    value="{{ old('color', $data->color) }}">
                                @error('color')
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

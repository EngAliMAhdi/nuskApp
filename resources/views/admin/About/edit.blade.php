@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        من نحن</a>
@endsection
@section('main_title_content', ' قائمة من نحن ')
@section('title_content', 'تعديل')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>تعديل بيانات </h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('about.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">السؤال </label>
                                <input type="text" name="question" class="form-control"
                                    value="{{ old('question', $data->question) }}">
                                @error('question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="answer">الإجابة </label>
                                <textarea name="answer" rows="6" class="form-control">{{ old('answer', $data->answer) }}</textarea>
                                @error('answer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">السؤال en</label>
                                <input type="text" name="question_en" class="form-control"
                                    value="{{ old('question_en', $data->question_en) }}">
                                @error('question_en')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="answer">الإجابة en</label>
                                <textarea name="answer_en" rows="6" class="form-control">{{ old('answer_en', $data->answer_en) }}</textarea>
                                @error('answer_en')
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

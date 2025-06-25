@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        ضبط التسعير</a>
@endsection
@section('main_title_content', ' قائمة ضبط التسعير ')
@section('title_content', 'عرض')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header d-felx ">
                    <h6>ضبط التسعير</h6>
                    <a href="{{ route('discount.edit') }}" class="btn btn-info btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> تعديل
                    </a>

                </div>
                <div class="px-0 pt-0 pb-2 card-body min-vh-50">

                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">أسم
                                        التنصيف
                                    </th>
                                    <th class="text-sm text-uppercase text-secondary font-weight-bolder opacity-7">
                                        نسبة الخصم
                                    </th>
                                </tr>
                            </thead>
                            @if (@isset($data))
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="gap-3 px-2 py-1 d-flex">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">الشركات</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->d_company }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="gap-3 px-2 py-1 d-flex">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">الافراد</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->d_person }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="gap-3 px-2 py-1 d-flex">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">أطفال أقل من سنتين</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->d_under_two }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="gap-3 px-2 py-1 d-flex">

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">أطفال من سنتين الى عشرة </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->d_between_two_ten }}</h6>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- model --}}
    <div class="modal fade" id="delete_reason">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center modal-title"> حذف البيانات</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="months_of_year_model_body">
                    <form action="{{ route('hotels.delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="delete_id">
                        <div class="form-group col-md-12">
                            <label for=""> سبب الحذف </label>
                            <textarea name="reason" class="form-control" cols="30" rows="10">{{ old('reason') }}</textarea>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End model --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.open-delete-modal').on('click', function() {

                let id = $(this).data('id');
                console.log(id);
                $('#delete_id').val(id);
            });
        });
    </script>
@endsection

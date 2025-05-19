@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        الفنادق</a>
@endsection
@section('main_title_content', ' قائمة الفنادق ')
@section('title_content', 'عرض')

@section('content')
    @livewire('hotel-page')
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

@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        المستخدمين</a>
@endsection
@section('main_title_content', ' قائمة المستخدمين ')
@section('title_content', 'تعديل')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>تعديل مستخدم</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('user.update', $data->id) }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">اسم المستخدم</label>
                                <input type="text" name="username" value="{{ old('username', $data->username) }}"
                                    class="form-control form-control-sm" placeholder="">
                                @error('username')
                                    <small class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">البريد الإلكتروني</label>
                                <input type="email" name="email" value="{{ old('email', $data->email) }}"
                                    class="form-control form-control-sm" placeholder="">
                                @error('email')
                                    <small class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">كلمة المرور</label>
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control form-control-sm" placeholder="">
                                @error('password')
                                    <small class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="role">نوع المستخدم</label>
                                <select class="px-5 form-select form-select-sm" name="role">
                                    <option value="User" {{ old('role', $data->role) == 'User' ? 'selected' : '' }}>مستخدم
                                    </option>
                                    <option value="Delegate" {{ old('role', $data->role) == 'Delegate' ? 'selected' : '' }}>
                                        مندوب</option>
                                    <option value="admin" {{ old('role', $data->role) == 'admin' ? 'selected' : '' }}>موظف
                                        إداري</option>
                                    <option value="superadmin"
                                        {{ old('role', $data->role) == 'superadmin' ? 'selected' : '' }}>أدمن</option>
                                </select>
                                @error('role')
                                    <small class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 text-center col-md-12">
                            <button type="submit" class="btn btn-success btn-sm">تعديل</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

@endsection

@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        المستخدمين</a>
@endsection
@section('main_title_content', ' قائمة المستخدمين ')
@section('title_content', 'أضافة')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>أضافة مستخدم</h6>
                </div>
                <div class="px-5 pt-5 pb-2 card-body min-vh-50">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" name="username" value="{{ old('username') }}"
                                    class="form-control form-control-sm" placeholder="">
                                @error('username')
                                    <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control form-control-sm" placeholder="">
                                @error('email')
                                    <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">كلمة المرور</label>
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control form-control-sm" placeholder="">
                                @error('password')
                                    <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="role">نوع المستخدم</label>
                                <select class="px-5 form-select form-select-sm" name="role">
                                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>مستخدم</option>
                                    <option value="Delegate" {{ old('role') == 'Delegate' ? 'selected' : '' }}>مندوب
                                    </option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>موظف إداري
                                    </option>
                                    <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>أدمن
                                    </option>
                                </select>
                                @error('role')
                                    <small id="helpId" class="text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-success btn-sm">إضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

@endsection

@extends('layouts.main')
@section('title')
    <a class="opacity-5 text-dark" href="javascript:;">
        تفاصيل حجز السفر</a>
@endsection
@section('main_title_content', 'تفاصيل حجز السفر')
@section('title_content', 'عرض')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4 card">
            <div class="pb-0 card-header">
                <h6>تفاصيل حجز السفر #{{ $travelBooking->id }}</h6>
                <a href="{{ route('admin.travel-booking.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-arrow-left me-2"></i>العودة
                </a>
            </div>
            <div class="p-4 card-body">
                <!-- Booking Status Update -->
                <div class="mb-4 p-3 bg-light rounded">
                    <h6 class="mb-3">تحديث حالة الحجز</h6>
                    <form action="{{ route('admin.travel-booking.update-status', $travelBooking->id) }}" method="POST" class="row">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-3">
                            <label class="form-label">حالة الحجز</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $travelBooking->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                <option value="processing" {{ $travelBooking->status == 'processing' ? 'selected' : '' }}>قيد المعالجة</option>
                                <option value="completed" {{ $travelBooking->status == 'completed' ? 'selected' : '' }}>مكتمل</option>
                                <option value="cancelled" {{ $travelBooking->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">حالة الدفع</label>
                            <select name="payment_status" class="form-select">
                                <option value="pending" {{ $travelBooking->payment_status == 'pending' ? 'selected' : '' }}>غير مدفوع</option>
                                <option value="paid" {{ $travelBooking->payment_status == 'paid' ? 'selected' : '' }}>مدفوع</option>
                                <option value="failed" {{ $travelBooking->payment_status == 'failed' ? 'selected' : '' }}>فشل</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-info">تحديث</button>
                        </div>
                    </form>
                </div>

                <!-- User Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">معلومات المستخدم</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>الاسم:</strong></td>
                                <td>{{ $travelBooking->user->username }}</td>
                            </tr>
                            <tr>
                                <td><strong>البريد الإلكتروني:</strong></td>
                                <td>{{ $travelBooking->user->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>الهاتف:</strong></td>
                                <td>{{ $travelBooking->user->phone }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">معلومات الحجز</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>الدولة:</strong></td>
                                <td>{{ $travelBooking->country }}</td>
                            </tr>
                            <tr>
                                <td><strong>المدينة:</strong></td>
                                <td>{{ $travelBooking->city }}</td>
                            </tr>
                            <tr>
                                <td><strong>تاريخ الحجز:</strong></td>
                                <td>{{ $travelBooking->reservation_date }}</td>
                            </tr>
                            <tr>
                                <td><strong>السعر الإجمالي:</strong></td>
                                <td>{{ $travelBooking->total_price }} ر.س</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Transport Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">النقل إلى مكة</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>النوع:</strong></td>
                                <td>{{ $travelBooking->transport_type_to_mecca == 'bari' ? 'بري' : 'جوي' }}</td>
                            </tr>
                            @if($travelBooking->transport_type_to_mecca == 'bari' && $travelBooking->transportFromAirport)
                                <tr>
                                    <td><strong>وسيلة النقل:</strong></td>
                                    <td>{{ $travelBooking->transportFromAirport->name }}</td>
                                </tr>
                            @elseif($travelBooking->transport_type_to_mecca == 'jawi' && $travelBooking->airTransportFromAirport)
                                <tr>
                                    <td><strong>الطائرة:</strong></td>
                                    <td>{{ $travelBooking->airTransportFromAirport->airplane }}</td>
                                </tr>
                                <tr>
                                    <td><strong>رقم الرحلة:</strong></td>
                                    <td>{{ $travelBooking->airTransportFromAirport->flight_number }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3">النقل إلى المدينة</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>النوع:</strong></td>
                                <td>{{ $travelBooking->transport_type_to_madina == 'bari' ? 'بري' : 'جوي' }}</td>
                            </tr>
                            @if($travelBooking->transport_type_to_madina == 'bari' && $travelBooking->transportToMadina)
                                <tr>
                                    <td><strong>وسيلة النقل:</strong></td>
                                    <td>{{ $travelBooking->transportToMadina->name }}</td>
                                </tr>
                            @elseif($travelBooking->transport_type_to_madina == 'jawi' && $travelBooking->airTransportToMadina)
                                <tr>
                                    <td><strong>الطائرة:</strong></td>
                                    <td>{{ $travelBooking->airTransportToMadina->airplane }}</td>
                                </tr>
                                <tr>
                                    <td><strong>رقم الرحلة:</strong></td>
                                    <td>{{ $travelBooking->airTransportToMadina->flight_number }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                <!-- Hotel Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">الفنادق</h6>
                        <table class="table table-sm">
                            <tr>
                                <td><strong>فندق مكة:</strong></td>
                                <td>{{ $travelBooking->hotelInMecca ? $travelBooking->hotelInMecca->name : 'لم يتم تحديد فندق' }}</td>
                            </tr>
                            <tr>
                                <td><strong>فندق المدينة:</strong></td>
                                <td>{{ $travelBooking->hotelInMadina ? $travelBooking->hotelInMadina->name : 'لم يتم تحديد فندق' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Passengers Information -->
                <div class="mb-4">
                    <h6 class="mb-3">بيانات المسافرين</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>الاسم الأول</th>
                                    <th>الاسم الأخير</th>
                                    <th>تاريخ الميلاد</th>
                                    <th>الجنسية</th>
                                    <th>رقم الهوية</th>
                                    <th>السعر</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($travelBooking->passengers as $passenger)
                                <tr>
                                    <td>{{ $passenger->first_name }}</td>
                                    <td>{{ $passenger->last_name }}</td>
                                    <td>{{ $passenger->birth_date }}</td>
                                    <td>{{ $passenger->nationality }}</td>
                                    <td>{{ $passenger->national_id }}</td>
                                    <td>{{ $passenger->price }} ر.س</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection 
@extends('client.layouts.main')
@section('content')
<div class="contact-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-map-wrapper">
                    <div class="contact-map mb-40 w-100">
                        {!! $system ? $system->map : '' !!}
                    </div>
                    <div class="contact-message">
                        <div class="contact-title">
                            <h4>Thông tin liên hệ</h4>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <form class="contact-form" action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Họ và tên*</label>
                                        <input name="name" required="" type="text" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Email</label>
                                        <input name="email" required="" type="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Số điện thoại</label>
                                        <input name="telephone" required="" type="text" value="{{ old('telephone') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-input-style mb-30">
                                        <label>Tiêu đề*</label>
                                        <input name="subject" required="" type="text" value="{{ old('subject') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-textarea-style mb-30">
                                        <label>Nội dung*</label>
                                        <textarea class="form-control2" name="content" required=""></textarea>
                                    </div>
                                    <button class="submit contact-btn btn-hover" type="submit">
                                        Gửi
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- <p class="form-messege"></p> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info-wrapper">
                    <div class="contact-title">
                        <h4>Vị trí và thông tin liên hệ</h4>
                    </div>
                    <div class="contact-info">
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Địa chỉ:</span> {{ $system ? $system->address : '' }}</p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="pe-7s-mail"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Email: </span> {{ $system ? $system->email : '' }}</p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="pe-7s-call"></i>
                            </div>
                            <div class="contact-info-text">
                                <p><span>Số điện thoại: </span> {{ $system ? $system->phone : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    iframe {
        width: 100%;
        height: 400px;
    }
</style>
@endsection
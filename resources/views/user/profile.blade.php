
@extends('layouts.app')

@section('title')
Trắc Đạc Miền Tây Cần Thơ | Hồ sơ cá nhân
@endsection

@section('content')
<!-- text-center -->
  
<section >
      <div class="mt-4 small-padding-bottom"> 
          <div class="container"> 
                <div class="row">
                    <div class="col-md-12">
                        <lable>QUẢN LÝ HỒ SƠ CÁ NHÂN <b>CHỈNH SỬA</b></lable>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 text-justify">                
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data"> {{-- <- enctype for file upload --}}
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : Auth::user()->name }}" placeholder="Nhập tên">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('email') ? : Auth::user()->email }}" placeholder="Nhập Email">
                            @if($errors->has('email'))
                                <span class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Nhập mật khẩu">
                            @if($errors->has('password'))
                                <span class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </span>
                            @endif
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
                            <label class="custom-file-label" for="image">Hình ảnh đại diện</label>
                            @if($errors->has('image'))
                                <span class="invalid-feedback">
                                    {{$errors->first('image')}}
                                </span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3">GỬI XỬ LÝ</button>
                        </div>
                        
                    </form>
                    </div>
                </div>                  
          </div>
      </div>
    </section>
	
@endsection
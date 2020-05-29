
@extends('layouts.app')
@section('title')
Trắc Đạc Miền Tây Cần Thơ | Tin Hoạt Động
@endsection

@section('content')
<!-- text-center -->
  
<section >
      <div class="mt-4 small-padding-bottom"> 
          <div class="container"> 
                <div class="row text-center">
                    <div class="col-md-12">
                        <lable>QUẢN LÝ TIN HOẠT ĐỘNG <b>CHỈNH SỬA</b></lable>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 text-justify">                
                    <form action="{{route('todos.update',$todo->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">TIÊU ĐỀ</label>
                            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ? : $todo->title }}" placeholder="Enter Title">
                            @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                                <span class="invalid-feedback">
                                    {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="body">NỘI DUNG</label>
                            <textarea name="body" id="body" rows="4" class="txt-tinymce form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Enter Todo Description">{{ old('body') ? : $todo->body }}</textarea>
                            @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                                <span class="invalid-feedback">
                                    {{$errors->first('body')}} {{-- <- Display the First validation error --}}
                                </span>
                            @endif
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input {{$errors->has('image') ? 'is-invalid' : ''}}" id="image">
                            <label class="custom-file-label" for="image">HÌNH ẢNH</label>
                            @if($errors->has('image'))
                                <span class="invalid-feedback">
                                    {{$errors->first('image')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-primary">GỬI XỬ LÝ</button>
                        </div>
                        
                    </form>
                    </div>
                </div>                  
          </div>
      </div>
    </section>
	
@endsection
@extends('layouts.app')
@section('title')
Trắc Đạc Miền Tây Cần Thơ | Tin Hoạt Động
@endsection

@section('content')
<!-- text-center -->
  
<section >
      <div class="mt-4 small-padding-bottom"> 
          <div class="container"> 
                <div class="row">
                    <div class="col-md-12"> 
                        <lable>QUẢN LÝ TIN HOẠT ĐỘNG <b>CHI TIẾT</b> <a href="{{route('todos.edit',$todo->id)}}" class="btn btn-primary">CHỈNH SỬA</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">XÓA</a></lable>
                    <hr>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 text-justify">                
                    <h3 class="text-center">{{$todo->title}}</h3>
                    <p>{!!$todo->body!!}</p>
                    <br>
                    
                    <div class="clearfix"></div>
                    <div class="modal fade" id="delete-modal">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">THÔNG BÁO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Thực hiện xóa?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">ĐỒNG Ý</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">HỦY BỎ</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <form method="POST" id="delete-form" action="{{route('todos.destroy',$todo->id)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                    </div>
                </div>                  
          </div>
      </div>
    </section>
	
@endsection
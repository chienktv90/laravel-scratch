@extends('layouts.app')
@section('title')
Trắc Đạc Miền Tây Cần Thơ | Công trình
@endsection

@section('content')
<!-- text-center -->
  
<section >
      <div class="mt-4 small-padding-bottom"> 
          <div class="container"> 
                <div class="row">
                    <div class="col-md-12"> 
                        <lable>QUẢN LÝ CÔNG TRÌNH <b>CHI TIẾT</b> <a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary">CHỈNH SỬA</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">XÓA</a></lable>
                    <hr>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 text-justify">                
                    <h3 class="text-center">{{$project->title}}</h3>
                    <p>{!!$project->body!!}</p>
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
                    <form method="POST" id="delete-form" action="{{route('projects.destroy',$project->id)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                    </div>
                </div>                  
          </div>
      </div>
    </section>
	
@endsection
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
                        <lable>QUẢN LÝ TIN HOẠT ĐỘNG <b><a href="{{route('todos.create')}}">THÊM MỚI</a></b></lable>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 text-justify">                
                        <ul class="list-group py-3 mb-3">
                            @forelse($todos as $todo)
                                <li class="list-group-item my-2">
                                    <h5 class="float-left">{{$todo->title}}</h5>
                                    <p class="float-right">Created by: {{$todo->user->name}}</p>
                                    <div class="clearfix"></div>
                                    <p>{!!str_limit($todo->body,20)!!}</p>
                                    <p><img src="{{asset('storage/pics/'.$todo->image)}}" class="rounded-circle mr-1" height="30px" width="30px"></p>
                                    
                                    <a href="{{route('todos.show',$todo->id)}}">CHI TIẾT</a>
                                </li>
                            @empty
                                <h4 class="text-center">NỘI DUNG CHƯA CẬP NHẬT!</h4>
                                
                            @endforelse
                        </ul>

                        <div class="d-flex justify-content-center">
                            {{$todos->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
                        </div>
                    </div>
                </div>                  
          </div>
      </div>
    </section>
	
@endsection
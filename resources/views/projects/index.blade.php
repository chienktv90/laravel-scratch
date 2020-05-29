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
                        <lable>QUẢN LÝ CÔNG TRÌNH <b><a href="{{route('projects.create')}}">THÊM MỚI</a></b></lable>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-12 text-justify">                
                        <ul class="list-group py-3 mb-3">
                            @forelse($projects as $project)
                                <li class="list-group-item my-2">
                                    <h5 class="float-left">{{$project->title}}</h5>
                                    <p class="float-right">Created by: {{$project->user->name}}</p>
                                    <div class="clearfix"></div>
                                    <p>{!!str_limit($project->body,20)!!}</p>
                                    <p><img src="{{asset('storage/pics/'.$project->image)}}" class="rounded-circle mr-1" height="30px" width="30px"></p>
                                    
                                    <a href="{{route('projects.show',$project->id)}}">CHI TIẾT</a>
                                </li>
                            @empty
                                <h4 class="text-center">NỘI DUNG CHƯA CẬP NHẬT!</h4>
                                
                            @endforelse
                        </ul>

                        <div class="d-flex justify-content-center">
                            {{$projects->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
                        </div>
                    </div>
                </div>                  
          </div>
      </div>
    </section>
	
@endsection
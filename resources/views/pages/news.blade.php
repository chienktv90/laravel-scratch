@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row margin-bottom-10 mt-4">
                    <div class="col-md-12 text-center">
                        <h4 class="section-title">TIN HOẠT ĐỘNG</h4>
                        <div class="separator_wrapper">
                            <i class="icon icon-star-two red"></i>
                        </div>
						<!-- <p class="section-subtitle">GIỚI THIỆU DỊCH VỤ</p> -->
                    </div>
                </div>
    <div class="row">
    @forelse($todos as $todo)
              <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.15s">
                  <div class="services-icon">
                    <a href="{{route('pages.news-detail',$todo->id)}}"><img src="{{asset('storage/pics/'.$todo->image)}}" style="width:50px;" /></a>
                  </div>
                  <div class="services-text">
                      <h4><a href="{{route('pages.news-detail',$todo->id)}}">{{$todo->title}}</a></h4>
                      <p>{!!str_limit($todo->body,90)!!}</p>
                  </div>
              </div>
          @empty
          <h4 class="text-center">Nội dung sẽ được cập nhật sớm nhất!</h4>
      @endforelse		 
      </div>

      <div class="row d-flex justify-content-center">
        {{$todos->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
      </div>
</div>
@endsection
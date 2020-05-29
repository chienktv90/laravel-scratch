@extends('layouts.app')

@section('content')

<section >
		<div id="slide_banner" class="owl-carousel owl-theme">
			<div class="item">
				<img src="{{asset('storage/slider/slider2.webp')}}" />
			</div>
			<div class="item">
				<img src="{{asset('storage/slider/slider1.webp')}}" />
			</div>
      <div class="item">
				<img src="{{asset('storage/slider/slider3.webp')}}" />
			</div>
		</div>
    </section>
    <div>

      <!-- <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">WELCOME</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section> -->


<div class="container">

            <!--begin row-->
            <div class="row">
                <!--begin col-md-12-->
                <div class="col-md-12 mt-4 text-center">
                    <h4 class="section-title">TIN HOẠT ĐỘNG</h4>
                    
                    <div class="separator_wrapper">
                        <i class="icon icon-star-two red"></i>
                    </div>
            
                    <!-- <p class="section-subtitle">There are many variations of passages of Lorem Ipsum available, but the majority<br>have suffered alteration, by injected humour, or new randomised words.</p> -->
                </div>
                <!--end col-md-12-->
            
            </div>
            <!--end row-->
            
            <!--begin row-->
            <div class="row">


            @forelse($todos as $todo)
                <!--begin col-sm-4 -->
                <div class="col-sm-4">
                    
                    <!--begin blog-item -->
                    <div class="blog-item">
                        
                        <!--begin popup image -->
                        <div class="popup-wrapper">
                            <div class="popup-gallery">
                                <a href="{{route('pages.news-detail',$todo->id)}}">
									<img src="{{asset('storage/pics/'.$todo->image)}}" class="width-100" alt="pic"><span class="eye-wrapper2"><i class="icon icon-link eye-icon"></i></span>
								</a>
                            </div>
                        </div>
                        <!--begin popup image -->
                            
                        <!--begin blog-item_inner -->
                        <div class="blog-item-inner">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                            <h3 class="blog-title"><a href="{{route('pages.news-detail',$todo->id)}}">{{$todo->title}}</a></h3>
                            
                            <a href="#" class="blog-icons"><i class="icon icon-user"></i> Đăng tin bởi {{$todo->user->name}}</a>
                            
                            <a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$todo->created_at}}</a>
                            
                            <p>{!!str_limit($todo->body,90)!!}</p>
                                                                        
                        </div>
                        <!--end blog-item-inner -->
                        
                    </div>
                    <!--end blog-item -->
                        
                </div>
                <!--end col-sm-4-->

                @empty
                <h4 class="text-center">Nội dung sẽ được cập nhật sớm nhất!</h4>
            @endforelse		
				<!-- <div class="col-sm-12 text-center mb-5">
				  <a href="news.html" class="btn btn-lg btn-small-blue scrool">Xem tiếp</a>
				</div> -->
            </div>
            <!--end row-->

            <div class="row d-flex justify-content-center">
            {{$todos->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
            </div>
    
        </div>











      <!-- <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @forelse($todos as $todo)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm"><a href="{{route('todos.show',$todo->id)}}"><img class="img-fluid img-thumbnail" src="{{asset('storage/pics/'.$todo->image)}}" alt="Card image"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$todo->title}}</h5>
                        <p class="card-text">{{str_limit($todo->body,90)}}</p>

                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                          <a href="{{route('todos.show',$todo->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                          </div>
                          <small class="text-muted">in shop {{$todo->user->name}}</small>
                        </div>
                      </div>
                    </div>
                  </div>
            @empty
                <h4 class="text-center">Coming soon!</h4>
            @endforelse
          </div>

          <div class="row d-flex justify-content-center">
          {{$todos->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
          </div>
        </div>
      </div> -->


      

      <div class="section-testimonials">
        <div class="container testimonials-wrapper">
            <div class="row">
                <div class="col-sm-5">
                    <div class="testimonials-info">
                    
                        <img src="{{asset('storage/pics/logo.png')}}" class="author-pic" alt="John Doe">
                        
                        <p class="author-name">Trắc Đạc<br><span>khởi hành từ 2020</span></p>
                        
                    </div>
                </div>
                <div class="col-sm-7">
                
                    <p class="testimonials-text">Tư vấn khảo sát và đo đạc, trắc địa, lĩnh vực hoạt động: đo vẽ thành lập bản đồ địa chính, tỉ lệ 1:2000, đo vẽ hồ sơ kỹ thuật thửa đất, đo vẽ bản đồ phục vụ công tác xin cấp chỉ giới, khoan khảo sát</p>
                
                </div>
            </div>
        </div>
    </div>
      

    </div>
@endsection
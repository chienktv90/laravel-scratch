@extends('layouts.app')

@section('content')
<div class="container">
    	
	<section >
      <div class="small-padding-bottom" style="background:#fbfbfb;">
          <div class="container mt-4"> 
			<div class="row">				
				<div class="col-md-12" style="background:#fff; border:1px solid #e7e7e7; box-shadow:0 2px 5px rgba(0, 0, 0, 0.1); padding:10px 30px;">
					<!-- <ul class="breadcrumbs_list">
					  <li class="breadcrumbs_item"><a href="index.html">Home</a></li>
					  <li class="breadcrumbs_item"><i class="icon icon-angle-right"></i></li>
					  <li class="breadcrumbs_item"><a href="news.html">Latest News</a></li>
					  <li class="breadcrumbs_item"><i class="icon icon-angle-right"></i></li>
					  <li class="breadcrumbs_item"><a href="#">Theatre youth camp ends today</a></li>
					</ul> -->
					<div class="blog-item">
						<div class="blog-item-inner">					
							<h3 class="blog-title">{{$todo->title}}</h3>
							
							<a href="#" class="blog-icons"><i class="icon icon-user"></i> Đăng tin bởi {{$todo->user->name}}</a>
							
							<a href="#" class="blog-icons last"><i class="icon icon-calendar"></i> {{$todo->created_at}}</a>							
							<hr />
							<!-- <img src="{{asset('storage/pics/'.$todo->image)}}" class="rounded mx-auto d-block" alt="pic">						 -->
							<img src="{{asset('storage/pics/'.$todo->image)}}" class="w-50 rounded mx-auto d-block" alt="pic">
						
							<p>{!!$todo->body!!}</p>
							<!-- <p class="text-right"><b>— MB Subba</b></p> -->
						</div>
					</div>    
				</div>
				<!-- <div class="col-md-3" style="padding:30px 40px;">
					<h4>Latest News</h4>
					<ul class="sidebar">
						<li><h4>
							<a href="#">RENEW’s micro finance project reaches out to rural women</a>
							<span><i class="icon icon-user"></i> By Admin</span>                            
                            <span><i class="icon icon-calendar"></i> 22 Oct 2016</span>
						</h4></li>
						<li><h4><a href="#">Lions Clubs International donates ambulance to RENEW</a>
							<span><i class="icon icon-user"></i> By Admin</span>                            
                            <span><i class="icon icon-calendar"></i> 22 Oct 2016</span>
							</h4></li>
						<li><h4><a href="#">Pilots pledge Nu 12M to RENEW</a>
							<span><i class="icon icon-user"></i> By Admin</span>                            
                            <span><i class="icon icon-calendar"></i> 22 Oct 2016</span>
						</h4></li>
					</ul>			
				</div> -->
			</div>          
          </div>
      </div>
    </section>
	
</div>
@endsection
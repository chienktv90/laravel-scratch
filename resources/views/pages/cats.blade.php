@extends('layouts.app')

@section('content')
<div class="container">

<section class="small-padding-bottom" id="kid">
        <div class="container">
            <div class="row margin-bottom-10 mt-4">
                <div class="col-md-12 text-center">
                    <h4 class="section-title">CÔNG TRÌNH TIÊU BIỂU</h4>
                    <div class="separator_wrapper">
                        <i class="icon icon-star-two red"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                    @forelse($cats as $cat)
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.15s">
                            <div class="team-popup">                                
                                <img src="{{asset('storage/pics/'.$cat->image)}}" class="width-100" alt="pic">
                                <div class="team-popup-overlay">
                                    <div>
                                        {!!str_limit($cat->body,90)!!}
                                    </div>
                                </div>
                            </div>
                            <div class="team-box">
                                
                                <h4><a href="{{route('pages.cats-detail',$cat->id)}}">{{$cat->title}}</a></h4>
                            </div>
                        </div>
                        @empty
                        <h4 class="text-center">Nội dung sẽ được cập nhật sớm nhất!</h4>
                    @endforelse
            </div>
            <div class="row">
                <div id="slide_kids" class="owl-carousel owl-theme">
					<!-- <div class="item">
                        <div class="col-sm-12 wow fadeIn" data-wow-delay="0.15s">
                            <div class="popup-gallery first-gallery portfolio-pic">
                                <a class="popup2" href="{{asset('storage/pics/5de614a78a57b.png')}}">
                                    <img src="{{asset('storage/pics/5de614a78a57b.png')}}" class="width-100" alt="pic">
                                    <span class="eye-wrapper"><i class="icon icon-cursor-move eye-icon" style="font-size: 38px;"></i>
                                        <div class="text-left m-3" style="font-size: 15px; color: #fff;">
                                            Moncity là một trong những khách hàng tiêu biểu của chúng tôi, được biết đến là dự án lớn nhất khu vực Mỹ Đình.
                                        </div>
                                    </span>
                                    
                                </a>
                            </div>
                        </div>
					</div> -->
                    
                    
				</div>
            </div>
        </div>
    </section>
</div>
@endsection
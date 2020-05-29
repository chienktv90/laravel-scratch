@extends('layouts.app')

@section('title')
Trắc Đạc Miền Tây Cần Thơ | Liên Hệ
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
    <div class="col-md-6">
        <div class="col4-footer">
            <ul class="links" style="list-style-type:none;">
								<li>Mọi thông tin xin liện hệ:</li>
								<li><h5>DỊCH VỤ TRẮC ĐẠC MIỀN TÂY CẦN THƠ</h5></li>
								<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Địa chỉ: 132/23E đường 3/2 Phường Hưng Lợi, quận Ninh Kiều, TP Cần Thơ.
								</li>
								<li><i class="fa fa-phone" aria-hidden="true"></i> Điện thoại: <a href="tel:0986494395">0986.494.395</a> (mr Ngân) hoặc 0373.28.82.82.
								</li>
								<li><i class="fa fa-envelope" aria-hidden="true"></i> Gmail: <a href="mailto:tracdacmientaycantho@gmail.com">tracdacmientaycantho@gmail.com</a>
								</li>
								<li><i class="fa fa-globe" aria-hidden="true"></i> Website: <a href="http://tracdacmientaycantho.com">tracdacmientaycantho.com</a>
								</li>
							</ul>
            </div>
    </div>


     <div class="col-md-6">
       <div class="card card-user">
         <div class="card-header">
           <h5 class="card-title">Gửi yêu cầu</h5>
         </div>
        <div class="card-body">
           @if(Session::has('success'))
              <div class="alert alert-success">
        	    {{ Session::get('success') }}
               </div>
           @endif
           
          <form method="post" action="contact">
             {{csrf_field()}}
             <div class="row">
               <div class="col-md-12">
                 <div class="form-group">
                   <label> Họ Tên </label>
                   <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                   @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
             <div class="col-md-12">
               <div class="form-group">
                   <label> Email </label>
                   <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>   
             <div class="col-md-12">
                <div class="form-group">
                   <label> Số điện thoại </label>
                   <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number">
                   @error('phone_number')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
              <div class="col-md-12">
                 <div class="form-group">
                   <label> Chủ đề </label>
                   <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject">
                   @error('subject')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
              <div class="col-md-12">
                <div class="form-group">
                   <label> Nội dung </label>
                   <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
                   @error('message')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
             </div>
             <div class="row">
              <div class="update ml-auto mr-auto">
                 <button type="submit" class="btn btn-primary btn-round">Bắt đầu gửi</button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
</div>
@endsection

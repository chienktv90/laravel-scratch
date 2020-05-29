<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Tư vấn, dịch vụ đo nhanh uy tín chất lượng miền tây, cung cấp giải pháp trắc đạc cho doanh nghiệp tại Cần Thơ. Dịch vụ trắc đạc cần thơ, đo đạc cần thơ, đo đạc miền tây, đo ranh đất, định vị công trình, đo san lấp mặt bằng, đo quy hoạch, giải phóng mặt bằng, kỹ thuật trắc đạc miền tây, dịch vụ đo đạc nhanh chất lượng, kỹ sư xây dựng cần thơ, việc làm trắc đạc cần thơ, máy đo đạc cần thơ, dịch vụ đo nhanh uy tín chất lượng miền tây, định vị cọc miền tây, quan trắc cần thơ, quan trắc miền tây, đo lún, đo gps cần thơ, khảo sát cầu đường cần thơ, khảo sát giao thông.">
    <meta name="keywords" content="Dịch vụ trắc đạc cần thơ, đo đạc cần thơ, đo đạc miền tây, đo ranh đất, định vị công trình, đo san lấp mặt bằng, đo quy hoạch, giải phóng mặt bằng, kỹ thuật trắc đạc miền tây, dịch vụ đo đạc nhanh chất lượng, kỹ sư xây dựng cần thơ, việc làm trắc đạc cần thơ, máy đo đạc cần thơ, dịch vụ đo nhanh uy tín chất lượng miền tây, định vị cọc miền tây, quan trắc cần thơ, quan trắc miền tây, đo lún, đo gps cần thơ, khảo sát cầu đường cần thơ, khảo sát giao thôn">
    <meta name="author" content=“chienle>

    {{-- asset() helper is used to generate urls to assets from the public directory --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/style-magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('storage/font-awesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">

    <link rel="shortcut icon" href="{{asset('storage/pics/favicon.png')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />

    <style>
        .alert {
            z-index: 99;
            top: 60px;
            right: 18px;
            min-width: 30%;
            position: fixed;
            animation: slide 0.5s forwards;
        }

        @keyframes slide {
            100% {
                top: 30px;
            }
        }

        @media screen and (max-width: 668px) {
            .alert {
                /* center the alert on small screens */
                left: 10px;
                right: 10px;
            }
        }

        :root {
            --jumbotron-padding-y: 3rem;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .main {
            min-height: 390px;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

        /*
custome css
*/
        /* @font-face{
	font-family: Open Sans;
  src:url("storage/Open_Sans/OpenSans-Regular.ttf");
}
*{
	margin: 0;
	padding: 0;
	border-radius: 0 !important;
	font-family: Open Sans;
}
@font-face{
	font-family: Open Sans;
	src:url("storage/Open_Sans/OpenSans-Regular.ttf");
} */
        /*process menu*/
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            z-index: 1;
            background-color: #f5f5f5;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /*list product*/
        .list-product-title {
            width: 100%;
            text-transform: uppercase;
            margin-left: 5px;
            margin-right: 5px;

        }

        .list-product-subtitle {
            width: 100%;
            margin-left: 5px;
            margin-right: 5px;
        }

        /*product card*/
        .card-product {
            width: 100%;
            margin-left: 5px;
            margin-right: 5px;
            overflow: hidden;
            position: relative;
        }

        .product-title {
            margin-bottom: 0.25rem;
        }

        .card-text .product-price {
            position: relative;
        }

        .del-price {
            text-decoration: line-through;
        }

        .new-price {
            color: #f90;
            position: absolute;
            right: 0.5rem;
        }

        .btn-add-to-cart {
            background-color: #3a5c83 !important;
            color: white !important;
        }

        .btn-add-to-cart:hover {
            background-color: #f90 !important;
        }

        .btn-detail {
            border: 1px solid #3a5c83 !important;
        }

        .btn-detail:hover {
            color: white !important;
            background-color: #3a5c83 !important;
        }

        .sale-sticky {
            color: white;
            background-color: #f90;
            display: block;
            text-align: center;
            width: 120px;
            position: absolute;
            top: 11px;
            right: -39px;
            transform: rotate(45deg);
        }

        .call_now {
            position: fixed;
            bottom: 0px;
            left: 0px;
            background: #fff;
            z-index: 999999999999;
            width: 197px;
            /* opacity:0.6; */
        }

        .phone_text {
            font-weight: bold;
            position: absolute;
            background: #ffe800;
            color: #000;
            padding: 6px 17px;
            border-top-right-radius: 17px;
            font-size: 18px;
            bottom: 0px;
        }

        span.phone_text span {
            font-size: 18px;
            /* opacity: 1.0; */
        }

    </style>

    <title>@yield('title','Trắc Đạc Miền Tây Cần Thơ')</title>
</head>
<body>




    <!--begin loader -->
    <div id="loader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--end loader -->


    {{-- That's how you write a comment in blade --}}

    {{-- Navbar --}}
    @include('inc.navbar')
    <main>
        {{-- content from the view that extends this layout --}}
        @yield('content')
    </main>

    {{-- Footer --}}
    {{-- @include('inc.footer') --}}

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.nav.js')}}"></script>
    <script src="{{asset('js/jquery.scrollTo-min.js')}}"></script>
    <script src="{{asset('js/SmoothScroll.js')}}"></script>
    <script src="{{asset('js/wow.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>





    {{-- Flash Message --}}
    @if(session('status')) {{-- <- If session key exists --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}} {{-- <- Display the session value --}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script>
    <script>
        //close the alert after 3 seconds.
        $(document).ready(function() {

            $(".sel-status").select2();

            // setTimeout(function() {
            //   	$(".alert").alert('close');
            // }, 3000);

            $(".owl-next").html('<img src="https://d1ycj7j4cqq4r8.cloudfront.net/bbb447994b253bea1bb81b002e3413b2.svg" />');
            $(".owl-prev").html('<img src="https://d1ycj7j4cqq4r8.cloudfront.net/20bd4ea61b53e89f4d8c6531d59f19ab.svg" />');


            $('#navbar-collapse-02').onePageNav({
                filter: ':not(.external)'
            });

            tinymce.init({
                selector: 'textarea.txt-tinymce'
                , plugins: [

                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',

                    'searchreplace wordcount visualblocks visualchars code fullscreen',

                    'insertdatetime media nonbreaking save table contextmenu directionality',

                    'emoticons template paste textcolor colorpicker textpattern imagetools'

                ],

                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | responsivefilemanager',

                toolbar2: 'print preview media | forecolor backcolor emoticons',

                image_advtab: true,

                templates: [

                    {
                        title: 'Test template 1'
                        , content: 'Test 1'
                    },

                    {
                        title: 'Test template 2'
                        , content: 'Test 2'
                    }

                ]
                , height: 150
            });


        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</body>
</html>

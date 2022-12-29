<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     {{-- <link rel="stylesheet" href="{{asset('CSS/style1.css') }}"> --}}
     <link rel="stylesheet" href="{{asset('CSS/style3.css') }}">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>


</head>
<body>
    @if(session()->has('message'))
    <div class="position-alert" id="alert">
        <div class=" alert alert-success alert-dismissible fade show " role="alert">
            <strong>{{ session()->get('message')  }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    {{-- Nav --}}
    <div class=" container-fluid background-black d-flex ">
        <div class=" col-2">
            <p class="h3 pt-2 px-3 mad2">CARZ</p>
        </div>
        <div class=" col-2 pt-2 mad ">
            <a class=" decoration text-bar text-dark fw-bold text-center mad " href="#">Home</a>
        </div>
        <div class="col-2 pt-2 px-1 pl-lg-0 mad">
            {{-- <a class=" decoration text-bar text-dark fw-bold text-center mad" href="login">Login</a> --}}
            @if(Auth::user())
            <form action="{{ route('user.show',Auth::user()->id) }}">
                <button class="decoration text-bar text-dark fw-bolder text-center mad btn btn-link text-decoration-none pb-2">{{ Auth::user()->name }}</button>
            </form>

            @else
            <a class="decoration text-bar text-dark fw-bold text-center mad" href="login">Login <i class="fa-solid fa-user"></i></a>
            @endif
        </div>
        <div class="col-2 pt-2 px-1 pl-lg-0 mad ">
            <a class=" decoration text-bar text-dark fw-bold text-center mad" href="#">Spotlight</a>
        </div>
        <div class="col-2 pt-2 px-1 pl-lg-0 mad">
            <a class=" decoration text-bar text-dark fw-bold text-center mad" href="#">News</a>
        </div>
        <div class="col-2 col-xs-2 pb-2 px-1  mad mycart">
            <form action="{{ route('mycart') }}">
                <button class="nav-link btn btn-link active pb-2"><i class="fa-solid fa-cart-shopping"></i>My Cart</button>
            </form>
        </div>
    </div>

                {{-- SearchBar --}}
                <div class="input-group rounded  d-flex justify-content-center container-fluid background-search py-2">
                    <div class="form-group w-50">
                        <input type="input" class="form-control rounded-pill" placeholder="Search here what you need" name="searchs" id="search"/>
                    </div>
                </div>
                {{-- search items --}}
                <div class="container justify-content-center w-50 py-2 ">
                    <div class="list-group" id="lists">

                    </div>
                </div>

                {{-- Advanced search --}}
                <div class="container d-flex justify-content-center  py-2">
                    <form action="{{ route('car.advanced') }}">
                        <button class="btn btn-success">
                            Advanced Search <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

    {{-- Slider --}}

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.supercars.net/blog/wp-content/uploads/2020/09/wallpaperflare.com_wallpaper-1-1.jpg" class="d-block w-100 " height="400"alt="img1">
      </div>
      <div class="carousel-item">
          <img src="https://i.pinimg.com/736x/9e/9b/8d/9e9b8d49325cda9aa5dc7454db8cab87.jpg" class="d-block w-100 " height="400" alt="img2">
      </div>
      <div class="carousel-item">
        <img src="https://wallpapersmug.com/download/2560x1024/1f370d/need-for-speed-cool-cars-rides-4k.jpg" height="400" class="d-block w-100 " alt="img3">
    </div>
</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    {{-- <button class="carousel-control-next5" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> --}}
</div>
{{-- Cards --}}
<div class="row row-cols-1 row-cols-md-5 g-4 p-5">
    @foreach ( $random_products as $car )

    <div class="col">
        <div class="card h-100">
            <form action="{{ route('car.show',$car->car_id) }}">
                <button class="position relative btn btn-link px-0 py-">
                    <img src="{{ $car->getFirstMediaUrl() }}"
                    class="card-img-top" alt="..." height="170px">
                </button>
            </form>
                <div class="card-body">
                    <h3 class="card-title">{{ $car->car_brand }}</h3>
                <h5 class="card-title"> {{ $car->car_model }}  {{ $car->year }}</h5>
            </div>
            <div class="card-footer">
                <h3 class="card-title" style="color: red;">{{ $car->price }}$/day</h3>
            </div>
        </div>
    </div>
    @endforeach
 </div>

{{--  --}}

<div class="container-fluid ">
    <div class="row ">
        <div class="col-6 px-0 "><img class="w-100"
                src="https://carsguide-res.cloudinary.com/image/upload/f_auto,fl_lossy,q_auto,t_cg_hero_large/v1/editorial/review/hero_image/2021-bmw-m4-competition-coupe-green-justin-hillard-1001x565-%281%29.jpg">
        </div>
        <div class="col-6 first"  style="padding-top: 50px ;
        background-color:#666363;
        color: aliceblue;">
            <h4>
                NEW BMW : M4
            </h4>
            <p style=" padding-top: 10px ;">
                <span
                    style="display: block; height:3px ; width: 70px; background-color:#337fd3 ; margin: bottom 20px;">
                </span>
            <p style=" padding-top: 10px ;">

                he BMW M4 is a high-performance coupe alternative to the likes of the Alfa Romeo Giulia
                Quadrifoglio, Audi RS5 and Mercedes-AMG C63.
            </p>
     </p>

                <button class="btn btn-outline-primary w-25 " style="margin-top: 20px ; margin-left: 10px;background-color:#337fd3 ; text-decoration: none; color: aliceblue; height: 50px; border-color: #337fd3;">
                    <h5>

                        <span>
                            rent now
                        </span>
                    </h5>

                </button>


        </div>
    </div>
    <div class="row ">
        <div class="col-6" style="padding-top: 50px ;
          background-color:#1e1e1e;
          color: aliceblue;">
            <h4>
                NEW JEEP : CHEROKEE
            </h4>
            <p style=" padding-top: 10px ;">
                <span
                    style="display: block; height:3px ; width: 70px; background-color:#337fd3 ; margin: bottom 20px;">
                </span>
            <p style=" padding-top: 10px ;">
                The latest Jeep Cherokee ditches its nontraditional styling for a more familial Grand Cherokee Light design.In proper Jeep fashion, the Cherokee remains one of the most capable compact SUVs in the segment.
            </p>
            </p>
            <button class="baner-button button banner-button-animated w-25  " style="margin-top: 20px ; margin-left: 10px;background-color:#337fd3 ; text-decoration: none; color: aliceblue; height: 50px; border-color: #337fd3;">
                <h5>

                    <span>
                        rent now
                    </span>
                </h5>

            </button>
        </div>
        <div class="col-6 px-0"><img class="w-100 h-100"
                src="https://www.elbalad.news/Upload/libfiles/868/7/846.jpg">
        </div>

    </div>
</div>

{{--  --}}
<div class="registration py-5">
    <div class="title">
        <h3 class="title1">
            <span class="text">#Spotlight</span>
        </h3>
    </div>
    <div class="second_section">
        <div class="overall_container">
            <div class="pricture px-5">
                <img src="data:image/jpeg;base64,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"
                    alt="picture 1" height="300px" width="400px" />
                <h3><span>Tesla</span></h3>
                <p>
                    electric cars
                </p>
            </div>
            <div class="picture px-5">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9snJ2dmETQdEhPWclSCzcNPA5yFbW3NQRRA&usqp=CAU"
                    alt="picture 2" height="300px" width="400px" />
                <h3><span>Borch</span></h3>
                <p> fast cars </p>

            </div>
            <div class="picture px-5">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGexmmYd1Nov4PPvy6-oLWGfG6NCfsk6ir3g&usqp=CAU"
                    alt="picture 3" height="300px" width="400px" />
                <h3><span>MG</span></h3>
                <p>
                    full
                </p>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-primary w-25">shop cars</button>
        <button class="btn btn-outline-primary w-25">Discover</button>
    </div>
</div>

{{-- Footer --}}

<footer>
    <div class="container-fluid background-footer" id="Footer">
        <div class="container-fluid background-footer">

            <div class="row py-5">
                <div class=" col-12 pt-5 ps-5">
                    <div class="row">

                        <div class="col-xl-2 col-sm-6 col-12 flex-column col-lg-6 px-lg-5 ms-sm-3 ms-0 pb-3 pb-sm-0 ">
                            <div class="font-white h5">
                                Shops
                            </div>
                            <div class="pb-2 pt-4"><a href="" class="decoration footer-links">Home</a>
                            </div>
                            <div class="pb-2"><a href="" class="decoration footer-links">Cars</a> </div>
                            <div class="pb-2"><a href="" class="decoration footer-links">New</a>
                            </div>
                            <div class="pb-2"><a href="" class="decoration footer-links">My cart</a> </div>
                            <div><a href="" class="decoration footer-links">Account</a> </div>
                        </div>

                        <div class="col-xl-2 col-sm-6 col-12 col-lg-6 flex-column px-lg-5 ms-sm-3 ms-0 pb-3 pb-sm-0 offset-1">
                            <div class="font-white h5">
                                Information
                            </div>
                            <div class="pb-2 pt-4"><a href="" class="decoration footer-links">About us</a>
                            </div>
                            <div class="pb-2"><a href="" class="decoration footer-links">Customer Service</a> </div>
                            <div class="pb-2"><a href="" class="decoration footer-links">New Collection</a>
                            </div>
                            <div class="pb-2"><a href="" class="decoration footer-links">Best Sellers</a> </div>
                            <div><a href="" class="decoration footer-links">Blog</a> </div>
                        </div>

                        <div class="col-xl-2 col-sm-6 col-12 col-lg-6 flex-column ms-sm-5 px-lg-5 pb-3 pb-sm-0">
                            <div class="font-white h5">
                                Customer Service
                            </div>
                            <div class="pb-2 pt-4"><a href="#" class="decoration footer-links">Search Terms</a>
                            </div>
                            <div class="pb-2"><a href="#" class="decoration footer-links">Advanced Search</a>
                            </div>
                            <div class="pb-2"><a href="#" class="decoration footer-links">Orders and returns</a> </div>
                            <div class="pb-2"><a href="#" class="decoration footer-links">RSS</a> </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 px-xl-5 flex-column">
                            <div class="font-white h5">
                                Newsletter
                            </div>
                            <div class="pb-2 pt-4"><a href="#" class="decoration footer-links">Sign up for newsletter</a> </div>
                            <div class="pb-2">
                                <form action="" class="w-50">
                                <input type="" class="form-control rounded-pill" placeholder="Type your email" aria-label="Search" aria-describedby="search-addon" />
                                </form>
                            </div>
                            <div class="pb-2 pt-2"><button type="button" class="btn btn-primary btn-lg w-50">Subscribe</button>                            </div>
                        </div>

                    </div>


                </div>


            </div>

        </div>

    </div>


</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function () {
        $('#search').on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                type: "GET",
                url: "/search",
                data: {'searchs':value},
                success: function (data) {
                    $('#lists').html(data);
                }
            });
        });
    });
</script>

</body>
</html>

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
            <p class="h3 pt-2 px-3 mad2">NFLEON CARZ</p>
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
                <div class="container justify-content-center w-50 py-2 overflow-auto " id="lists">

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
        <img src="{{ asset('images/ford_bronco_8k-HD.jpg') }}" class="d-block w-100 " height="450"alt="img1">
      </div>
      <div class="carousel-item">
          <img src="{{ asset('images/jeep_trackhawk_8k_2-HD.jpg') }}" class="d-block w-100 " height="450" alt="img2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/bmw_m8_5k-HD.jpg') }}" height="450" class="d-block w-100 " alt="img3">
    </div>
</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
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
                <img src="{{ asset('images/2020_tesla_model_s_performance-HD.jpg') }}"
                    alt="picture 1" height="300px" width="400px" />
                <h3><span>Tesla</span></h3>
                <p>
                    electric cars
                </p>
            </div>
            <div class="picture px-5">
                <img src="{{  asset('images/topcar_mercedes_benz_g_350_d_light_package_2020_5k-HD.jpg')  }}"
                    alt="picture 2" height="300px" width="400px" />
                <h3><span>Mercedes</span></h3>
                <p> fast cars </p>

            </div>
            <div class="picture px-5">
                <img src=" {{  asset('images/ford_mustang_mach_1_8k-HD.jpg') }}"
                    alt="picture 3" height="300px" width="400px" />
                <h3><span>Ford</span></h3>
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

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
            <button class="nav-link btn btn-link active pb-2"><i class="fa-solid fa-cart-shopping"></i>My Cart</button>
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
    <div class="col">
        <div class="card h-100">
            <button class="position relative btn btn-link px-0 py-">
            <img src="data:image/jpeg;base64,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"
                class="card-img-top" alt="...">
            </button>
            <div class="card-body">
                <h5 class="card-title">Truck</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <h3 class="card-title" style="color: red;">100$/day</h3>
            </div>
        </div>
    </div>
    <div class="col">

        <div class="card h-100">
                <button class="position relative btn btn-link px-0 py-">
                <img src="data:image/jpeg;base64,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"
                class="card-img-top" alt="...">
            </button>
                <div class="card-body">
                    <h5 class="card-title">Sally</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <h3 class="card-title" style="color: red;">100$/day</h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <button class="position relative btn btn-link px-0 py-">
            <img src="data:image/jpeg;base64,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"
                class="card-img-top" alt="...">
            </button>
            <div class="card-body">
                <h5 class="card-title">mcQueen</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <h3 class="card-title" style="color: red;">100$/day</h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="data:image/jpeg;base64,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"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">King</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.
                </p>
            </div>
            <div class="card-footer">
                <h3 class="card-title" style="color: red;">100$/day</h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="data:image/jpeg;base64,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"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sheriff</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This card has even longer content than the first to show that equal height
                    action.</p>
            </div>
            <div class="card-footer">
                <h3 class="card-title" style="color: red;">100$/day</h3>
            </div>
        </div>
    </div>
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

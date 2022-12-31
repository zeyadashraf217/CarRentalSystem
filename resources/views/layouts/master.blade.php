
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Starter</title>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>




<aside class="main-sidebar sidebar-dark-primary elevation-4 overflow-auto">

<a href="{{ url('') }}" class="brand-link">
<span class="brand-text font-weight-light">NFLEON Carz©</span>
</a>

<div class="sidebar overflow-scroll">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
</div>
<div class="info">
<a href="" class="d-block">{{ Auth::user()->name }}</a>
</div>
</div>


<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"  data-accordion="false">
<li class="nav-item" >
    <form action="{{ route('user.index') }}">

<button class="nav-link  btn btn-link" id="item-1">
    <i class="fa-solid fa-user"></i>
    <p>
        Users
        </p>
        </button>
        </form>
        </li>
<li class="nav-item" >
    <form action="{{ route('car.index') }}">
        <button  class="nav-link btn btn-link" id="item-2" aria-current="page">
            <i class="fa-solid fa-car"></i>
    <p>
        Cars
        </p>
        </button>
        </form>
</li>
<li class="nav-item" >
    <form action="{{ route('office.index') }}">

<button class="nav-link btn btn-link" id="item-3">
    <i class="fa-solid fa-building"></i>
    <p>
        Offices
        </p>
        </button>
    </form>
        </li>
        <li class="nav-item" >
            <form action="{{ route('reservation.search') }}">

        <button class="nav-link btn btn-link" id="item-4">
            <i class="fa-solid fa-list"></i>
            <p>
                Reservation Search
                </p>
                </button>
            </form>
                </li>


        <li class="nav-item" >
            <form action="{{ route('interval.search') }}">

        <button class="nav-link btn btn-link" id="item-5">
            <i class="fa-solid fa-list"></i>
            <p>
                Interval Search
                </p>
                </button>
            </form>
        </li>

        <li class="nav-item" >
            <form action="{{ route('interval.search2') }}">

        <button class="nav-link btn btn-link" id="item-6">
            <i class="fa-solid fa-list"></i>
            <p>
                Interval Search 2
                </p>
                </button>
            </form>
        </li>

        <li class="nav-item" >
            <form action="{{ route('report.status') }}">

        <button class="nav-link btn btn-link" id="item-7">
            <i class="fa-solid fa-list"></i>
            <p>
            Status Search
                </p>
                </button>
            </form>
        </li>

        <li class="nav-item" >
            <form action="{{ route('userreservation') }}">

        <button class="nav-link btn btn-link" id="item-8">
            <i class="fa-solid fa-list"></i>
            <p>
            Customer Reservation
                </p>
                </button>
            </form>
        </li>

        <li class="nav-item" >
            <form action="{{ route('daily') }}">
        <button class="nav-link btn btn-link" id="item-9">
            <i class="fa-solid fa-list"></i>
            <p>
            Daily Payments
                </p>
                </button>
            </form>
        </li>


</ul>
</nav>



</div>

</aside>

<div>
@yield('content')
</div>



<aside class="control-sidebar control-sidebar-dark">

    <div class="p-3">
<h5>Title</h5>
<p>Sidebar content</p>
</div>
</aside>


        </div>



        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

</body>
</html>

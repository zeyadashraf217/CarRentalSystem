<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 pt-5">
            <h4>Account Information</h4>
            <hr>
                <div class="form-group leo">
                    <label for="name">name</label>
                    <input type="text"  name="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">email </label>
                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="type">type</label>
                    <input type="text" name="type" class="form-control" value="{{ Auth::user()->type }}" disabled>
                </div>
                <div class="form-group">
                    <label for="type">Phone number</label>
                    <input type="text" name="type" class="form-control" value="{{ Auth::user()->phonenumber }}" disabled>
                </div>
                <div class="col-md-4 col-md-offset-4 pt-3">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </div>
                @if(Auth::user()->type=='admin')
                <div class="col-md-4 col-md-offset-4 pt-3">

                    <form action="{{ route('user.index') }}">
                    <button class="btn btn-primary" type="submit" >DashBoard</button>
                    </form>
                </div>
                @endif
        </div>
    </div>
</div>
</body>
</html>

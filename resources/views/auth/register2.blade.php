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
            <h4>Registration</h4>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" placeholder="Please Enter Full name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" placeholder="Please Enter email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone number">Phone number</label>
                    <input type="text" class="form-control" placeholder="Please Enter phone number" name="phonenumber">
                    @error('phonenumber')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" placeholder="Please Enter your password" name="password">
                    @error('password')
                    <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">confirm-password</label>
                    <input type="password" class="form-control" placeholder="Please Renter your password" name="password_confirmation">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
                <br>
                <a href="login">Already Registered? Login here.</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

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
    <title>Create_car</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 pt-5">
                <h4>Update car</h4>
                <hr>
                <form action="{{ route('car.update',$car->car_id) }}"  method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text"  name="brand" class="form-control" value="{{ $car->brand }}" required >
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text"  name="model" class="form-control" value="{{ $car->model }}" required >
                    </div>

                    <div class="form-group">
                        <label for="model">Plate Number</label>
                        <input type="text"  name="plate_id" class="form-control" value="{{ $car->model }}" required >
                        @error('plate_id')
                        <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text"  name="color" class="form-control" value="{{ $car->color }}" required >
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number"  name="year" class="form-control" value="{{ $car->year }}" required >
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"  name="price" class="form-control" value="{{ $car->price }}" required >
                    </div>

                    <div class="form-group">
                        <label for="office">Office</label>
                        {{-- @dd($car->office->office_id) --}}
                        <select name="office_id" class="form-control" value="{{ $car->office->city }}"  required>
                            @foreach ($offices as $office )
                            <option value="{{ $office->office_id }}"> {{ $office->city }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group pt-2">
                        <button type="submit" class="btn btn-labeled btn-warning">
                            <span class="btn-label pe-3"><i class="fa-solid fa-plus"></i></span>Update car
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>

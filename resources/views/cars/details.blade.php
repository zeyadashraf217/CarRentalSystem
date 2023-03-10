<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 px-0">
            <img src="{{ $car->getFirstMediaUrl() }}" height="100%" class="img-fluid">
        </div>
        <div class="col-md-6 pt-5 px-5">
            <div class="h2 pt-5">
                {{ $car->car_brand }}

                {{ $car->car_model }}

            </div>
            <div class="text-danger h3">
                {{ $car->price }}$
            </div>
            <div class="pt-3">
                <form action="{{ route('add_item') }}" method="POST" id="forms">
                    @csrf
                    <div class="form-group py-2">
                        <label for="pickups">Pickup Date</label>
                        <input type="date" id="pickup" name="pickups" class="form-control" required>
                    </div>
                    <div class="form-group py-2">
                        <label for="returns">Return Date</label>
                        <input type="date" id="return" name="returns" class="form-control" required>
                    </div>
                    <div id='add'>
                    </div>
        <input type="text" name='user_id' value="{{ Auth::user()->id }}" hidden>
        <input type="text" name='car_id' id="car_id" value="{{ $car->car_id }}" hidden>
                    </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function () {
        $('#forms').on('change', function(){
            pickup = $("input#pickup").val()
            retrn = $("input#return").val()
            id = $("input#car_id").val()

            $.ajax({
                type: "GET",
                url: "/reservation",
                data: {
                    'pickups':pickup,
                    'returns':retrn,
                    'car_id':id,
            },
                success: function (data) {
                    $('#add').html(data);
                }
            });
        });
    });
</script>
</body>
</html>

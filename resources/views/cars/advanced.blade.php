<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     </head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 pt-5">
                <h4>Advanced Search</h4>
                <hr>
                <form action=""  method="post" id="form"  >

                    <div class="form-group">
                        <label for="office">office</label>
                        <select name="office_id" class="form-control" id="office" name="offices" required>
                            <option value="true"></option>
                            @foreach ($offices as $office )
                            <option value="{{$office->office_id}}"> {{ $office->city }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="car_brand">Car_brand</label>
                        <select name="car_brand" class="form-control" id="brand" name="brands" required>
                            <option value="true"></option>
                            @foreach ($brands as $brand )
                            <option value=" {{$brand->car_brand}} "  > {{ $brand->car_brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="car_model">Car_model</label>
                        <select name="car_model" class="form-control" id="model" required>
                            <option value="true"> </option>
                            @foreach ($models as $brand )
                            <option value=" {{$brand->car_model}} "  > {{ $brand->car_model }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="table">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

    <script>

        $(document).ready(function () {

            x=$( "select#office" ).val();
            console.log(x)
            $('#form').on('change', function(){
                office=$( "select#office" ).val();
                brand=$( "select#brand" ).val();
                model=$( "select#model" ).val();
                $.ajax({
                    type: "get",
                    url: "/change",
                    data: {"offices":office,"brands":brand,"models":model},
                    success: function (data) {
                        $('#table').html(data);
                    }
                });
            });


            $('#brand').on('change', function(){
                var value = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/model",
                    data: {"brands":value},
                    success: function (data) {
                        $('#model').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>

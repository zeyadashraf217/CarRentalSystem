<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <form action="" method="post" id="form">
            <div class="row">
                <h4>Advanced Search</h4>
                <hr>
                <div class="col-md-4 col-md-offset-4 ">
                    <div class="form-group">
                        <label for="office">office</label>
                        <select name="office_id" class="form-control" id="office" name="offices" required>
                            <option value="true"></option>
                            @foreach ($offices as $office)
                                <option value="{{ $office->office_id }}"> {{ $office->city }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="car_brand">Car_brand</label>
                        <select name="car_brand" class="form-control" id="brand" name="brands" required>
                            <option value="true"></option>
                            @foreach ($brands as $brand)
                                <option value=" {{ $brand->car_brand }} "> {{ $brand->car_brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="car_model">Car_model</label>
                        <select name="car_model" class="form-control" id="model" required>
                            <option value="true"> </option>
                            @foreach ($models as $brand)
                                <option value=" {{ $brand->car_model }} "> {{ $brand->car_model }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">

                    <div class="form-group">
                        <label for="office">color</label>
                        <select class="form-control" id="color" name="colors" required>
                            <option value="true"></option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->color }}"> {{ $color->color }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="min_years">min year</label>
                        <input type="number" class="form-control" id="min_year" name="min_years"
                            value="{{ $min_year }}" placeholder="{{ $min_year }}">
                    </div>
                    <div class="form-group">
                        <label for="max_years">max year</label>
                        <input type="number" class="form-control" id="max_year" name="max_years"
                            value="{{ $max_year }}" placeholder="{{ $max_year }}">
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4 ">
                    <div class="form-group">
                        <label for="min_prices">min price</label>
                        <input type="number" class="form-control" id="min_price" name="min_prices"
                        value="{{ $min_price }}" placeholder="{{ $min_price }}">
                    </div>

                    <div class="form-group">
                        <label for="max_prices">max price</label>
                        <input type="number" class="form-control" id="max_price" name="max_prices"
                        value="{{ $max_price }}" placeholder="{{ $max_price }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="table">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var func = function() {
                min_year = $("input#min_year").val()
                max_year = $("input#max_year").val()
                min_price = $("input#min_price").val()
                max_price = $("input#max_price").val()
                office = $("select#office").val();
                brand = $("select#brand").val();
                model = $("select#model").val();
                color = $("select#color").val();
                $.ajax({
                    type: "get",
                    url: "/change",
                    data: {
                        "offices": office,
                        "brands": brand,
                        "models": model,
                        "min_years": min_year,
                        "max_years": max_year,
                        "min_prices": min_price,
                        "max_prices": max_price,
                        "colors": color
                    },
                    success: function(data) {
                        $('#table').html(data);
                    }
                });
            }

            $('#min_year').on('keyup', func);
            $('#max_year').on('keyup', func);
            $('#min_price').on('keyup', func);
            $('#max_price').on('keyup', func);
            $('#form').on('change', func);


            $('#brand').on('change', function() {
                var value = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/model",
                    data: {
                        "brands": value
                    },
                    success: function(data) {
                        $('#model').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 pt-5">
                <h4>My cart</h4>
                <hr>
            </div>
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>thumbnail</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($items as $item)
                        @if ($item->user_id == Auth::user()->id)
                            <tr>


                                <td><img src="{{ $item->car->getFirstMediaUrl() }}" alt="" height="100px">
                                </td>
                                <td class="h3 pt-5">{{ $item->car->car_brand }} </td>
                                <td class="h3 pt-5">{{ $item->car->car_model }} </td>
                                <td class="h3 pt-5"> {{ $item->car->price }}</td>
                                <td class="pt-5">
                                    <form action="{{ route('mycart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>

            </table>

        </div>
        <div class="row ">
            <div class="col-md-4 offset-2">
                <form action="{{ route('checkout') }} " method="POST">
                    @csrf
                    <button type="submit" class="btn btn-labeled btn-success ms-5">
                        Procced to checkout
                    </button>
            </div>
            </form>
        </div>
    </div>


</body>

</html>

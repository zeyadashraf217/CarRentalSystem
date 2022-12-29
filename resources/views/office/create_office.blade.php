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
    <title>Create_office</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 pt-5">
                <h4>Create office</h4>
                <hr>
                <form action="{{ route('office.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text"  name="city" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text"  name="country" class="form-control" required >
                    </div>
                    <div class="form-group pt-2">
                        <button type="submit" class="btn btn-labeled btn-success">
                            <span class="btn-label pe-3"><i class="fa-solid fa-plus"></i></span>Add office
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>

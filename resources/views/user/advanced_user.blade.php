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
                        <label for="names">User Name</label>
                        <select  class="form-control" id="name" name="names" required>
                        <option value="true"></option>
                            @foreach ($names as $user)
                                <option value="{{ $user->name }}"> {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                        <label for="emails">Email</label>
                        <select  class="form-control" id="email" name="emails" required>
                            <option value="true"></option>
                            @foreach ($users as $user)
                            <option value="{{ $user->email }}"> {{ $user->email }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                        <label for="phones">phonenumber</label>
                        <select  class="form-control" id="phone" name="phones" required>
                            <option value="true"> </option>
                            @foreach ($users as $user)
                            <option value="{{ $user->phonenumber }}"> {{ $user->phonenumber }}</option>
                        @endforeach
                        </select>
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
                name = $("select#name").val();
                email = $("select#email").val();
                phone = $("select#phone").val();
                $.ajax({
                    type: "get",
                    url: "/userchange",
                    data: {
                        "names": name,
                        "emails": email,
                        "phones":phone,
                    },
                    success: function(data) {
                        $('#table').html(data);
                    }
                });
            }
            $('#form').on('change', func);



        });
    </script>
</body>

</html>

@extends('layouts.master')
@section('content')
<script>
    $('#item-1').removeClass('active');
    $('#item-2').removeClass('active');
      $('#item-3').removeClass('active');
      $('#item-4').removeClass('active');
      $('#item-5').removeClass('active');
      $('#item-6').removeClass('active');
      $('#item-7').removeClass('active');
      $('#item-9').removeClass('active');
      $('#item-8').addClass('active');
      e.preventDefault();
</script>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Reservation</h1>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <form action="" method="post" id="form">
        <div class="row">
            <div class=" col-md-3 offset-2  ">
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

            <div class="col-md-3">
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

            <div class="col-md-3 ">
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
<div id="table" class="offset-2">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
 $(document).ready(function() {
            var func = function() {
                name = $("select#name").val();
                email = $("select#email").val();
                phone = $("select#phone").val();
                $.ajax({
                    type: "get",
                    url: "/userchange2",
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


@endsection


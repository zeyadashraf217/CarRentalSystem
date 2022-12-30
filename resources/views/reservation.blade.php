@extends('layouts.master')
@section('content')
<script>
    $('#item-1').removeClass('active');
    $('#item-2').removeClass('active');
      $('#item-3').removeClass('active');
      $('#item-4').addClass('active');
      e.preventDefault();
</script>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reservation Search</h1>
                </div>
            </div>
        </div>
    </div>

</div>
<div class=" offset-2 col-5 pt-3">
    <form action=""  id="forms">
        <div class="form-group py-2">
            <label for="reservations">Reservation</label>
            <input type="date" id="reservation" name="reservations" class="form-control" required>
        </div>

        </form>
</div>
<div id='add' class="offset-2">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function () {
        $('#forms').on('change', function(){
            reservation = $("input#reservation").val()
            console.log(reservation)
            $.ajax({
                type: "GET",
                url: "/reservationsearch",
                data: {
                    'reservations':reservation,
            },
                success: function (data) {
                    $('#add').html(data);
                }
            });
        });
    });
</script>


@endsection


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
<form action=""  id="forms">
        <div class=" offset-2 col-4 pt-3">
        <div class="form-group py-2">
            <label for="starts">Start Date</label>
            <input type="date" id="start" name="starts" class="form-control" required>
        </div>

    </div>

    <div class=" offset-2 col-4 pt-3">
        <div class="form-group py-2">
            <label for="ends">End Date</label>
            <input type="date" id="end" name="ends" class="form-control" required>
        </div>

    </div>
        </form>
<div id='add' class="offset-2">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function () {
        $('#forms').on('change', function(){
            start = $("input#starts").val()
            end = $("input#ends").val()
            console.log(reservation)
            $.ajax({
                type: "GET",
                url: "/interval",
                data: {
                    'starts':start,
                    'ends':end,
            },
                success: function (data) {
                    $('#add').html(data);
                }
            });
        });
    });
</script>


@endsection


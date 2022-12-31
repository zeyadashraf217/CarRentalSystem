@extends('layouts.master')
@section('content')
<script>
    $('#item-1').removeClass('active');
    $('#item-2').removeClass('active');
      $('#item-3').removeClass('active');
      $('#item-4').removeClass('active');
      $('#item-5').removeClass('active');
      $('#item-7').removeClass('active');
      $('#item-8').removeClass('active');
      $('#item-9').removeClass('active');

      $('#item-6').addClass('active');
      e.preventDefault();
</script>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reservation Search by plate number</h1>
                </div>
            </div>
        </div>
    </div>

</div>
<form action=""  id="forms">
    <div class="row">

        <div class=" offset-2 col-3 pt-3">
            <div class="form-group py-2">
            <label for="starts">Start Date</label>
            <input type="date" id="start" name="starts" class="form-control" required>
        </div>

    </div>

    <div class="col-3 pt-3">
        <div class="form-group py-2">
            <label for="ends">End Date</label>
            <input type="date" id="end" name="ends" class="form-control" required>
        </div>
    </div>
<div class="col-3 pt-3">
    <div class="form-group py-2">
        <label for="plates">Plate Id</label>
        <select  class="form-control" id="plate" name="plates" required>
            <option value="true"></option>
            @foreach ($cars as $car)
                <option value=" {{ $car->plate_id }} "> {{ $car->plate_id }}</option>
                @endforeach
            </select>
        </div>
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
            start = $("input#start").val()
            end = $("input#end").val()
            plate= $("select#plate").val()
            console.log(plate)
            $.ajax({
                type: "GET",
                url: "/intervall2",
                data: {
                    'starts':start,
                    'ends':end,
                    'plates':plate
            },
                success: function (data) {
                    $('#add').html(data);
                }
            });
        });
    });
</script>


@endsection


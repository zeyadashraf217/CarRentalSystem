@extends('layouts.master')
@section('content')
<script>
    $('#item-1').removeClass('active');
    $('#item-2').removeClass('active');
      $('#item-3').removeClass('active');
      $('#item-4').removeClass('active');
      $('#item-6').removeClass('active');
      $('#item-7').removeClass('active');
      $('#item-8').removeClass('active');
      $('#item-9').removeClass('active');

      $('#item-5').addClass('active');
      e.preventDefault();
</script>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Interval Search</h1>
                </div>
            </div>
        </div>
    </div>

</div>
<form action=""  id="forms">
    <div class="row">

        <div class=" offset-2 col-4 pt-3">
            <div class="form-group py-2">
            <label for="starts">Start Date</label>
            <input type="date" id="start" name="starts" class="form-control" required>
        </div>

    </div>

    <div class="col-4 pt-3">
        <div class="form-group py-2">
            <label for="ends">End Date</label>
            <input type="date" id="end" name="ends" class="form-control" required>
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
            $.ajax({
                type: "GET",
                url: "/intervall",
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


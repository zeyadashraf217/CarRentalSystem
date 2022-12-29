@extends('layouts.master')
@section('content')
<script>
      $('#item-2').removeClass('active');
        $('#item-1').removeClass('active');
        $('#item-3').addClass('active');
        e.preventDefault();
</script>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">office Page</h1>
    </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">offices table</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <form action="{{ route('office.create') }}">
                    <button type="submit" class="btn btn-labeled btn-success">
                        <span class="btn-label pe-3"><i class="fa-solid fa-plus"></i></span>Add office
                    </button>
                </form>
            </div>
        </div>
        </div>
        <div class="card-body table-responsive p-0" style="height: 550px;">
        <table class="table table-head-fixed text-nowrap">
        <thead>
        <tr>
        <th>ID</th>
        <th>City</th>
        <th>Country</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($offices as $office)
            <tr>
                <td>{{ $office->office_id  }} </td>
                <td>{{ $office->city  }} </td>
                <td>{{ $office->country  }} </td>
                <td>

                        <form action="{{ route('office.destroy',$office->office_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> </button>
                        </form>
                        <form action="{{ route('office.edit',$office->office_id) }}" class="pt-2">

                            <button class="btn btn-warning pt-2"> <i class="fa-solid fa-pen"></i> </button>
                        </form>
                </td>
            </tr>

            @endforeach

        </tbody>
        </table>
        </div>

        </div>

        </div>
        </div>



</div>

@endsection

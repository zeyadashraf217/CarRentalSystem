@extends('layouts.master')
@section('content')
<script>
      $('#item-1').removeClass('active');
        $('#item-3').removeClass('active');
        $('#item-4').removeClass('active');
        $('#item-2').addClass('active');
        e.preventDefault();
</script>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Cars Page</h1>
    </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Cars table</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <form action="{{ route('car.create') }}">
                    <button type="submit" class="btn btn-labeled btn-success">
                        <span class="btn-label pe-3"><i class="fa-solid fa-plus"></i></span>Add Car
                    </button>
                </form>
            </div>
        </div>
        </div>
        <div class="card-body table-responsive p-0" style="height: 530px;">
        <table class="table table-head-fixed text-nowrap">
        <thead>
        <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Plate number</th>
        <th>office</th>
        <th>Image</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <td>{{ $car->car_id  }} </td>
                <td>{{ $car->car_brand  }} </td>
                <td>{{ $car->car_model  }} </td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->plate_id }}</td>
                <td> {{ $car->office->city }}</td>
                <td><img src="{{ $car->getFirstMediaUrl() }}" alt="" height="110px" width="200px"></td>
                <td>

                         <form action="{{ route('car.destroy',$car->car_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> </button>
                        </form>
                        <form action="{{ route('car.edit',$car->car_id) }}" class="pt-2">

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

        <div class="container d-flex justify-content-center">
            <form action="{{ route('car.advanced') }}">
                <button class="btn btn-success">
                    Advanced Search <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

</div>

@endsection

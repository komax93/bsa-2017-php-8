@extends('app')

@section('title')
    {{ $car->getModel() }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1>{{ $car->getModel() }}</h1>
        <p>{{ $car->getModel() }} info page.</p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Registration number</th>
                    <th>Color</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $car->getModel() }}</td>
                    <td>{{ $car->getYear() }}</td>
                    <td>{{ $car->getRegistrationNumber() }}</td>
                    <td>{{ $car->getColor() }}</td>
                    <td>{{ $car->getPrice() }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="text-align: center"><strong>You may execute these actions</strong></h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('cars.edit', $car->getId()) }}" class="btn btn-primary btn-block edit-button">Edit</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('cars.index') }}" class="btn btn-danger btn-block delete-button">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
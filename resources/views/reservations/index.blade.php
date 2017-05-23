@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reservation</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>How many persons</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->person_count }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reserv table</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('reservations.store') }}" method="post" >
                            {{ csrf_field() }}
                            Name:
                            <br />
                            <input type="text" name="name" value="{{ $user->name }}" />
                            <br /><br />
                            How many persons:
                            <br />
                            <input type="number" name="person_count" />
                            <br/><br/>
                            Date:
                            <br />
                            <input type="date" name="date" value="{{ old('date') }}" />
                            <br/><br/>
                            Time:
                            <br />
                            <input type="datetime" name="time" />
                            <br /><br />
                            Phone:
                            <br/>
                            <input type="text" name="phone" value="{{ $user->phone }}" />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
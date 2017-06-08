@extends('layouts.app')

@section('content')
    <div id="cart">
        <div class="container align1">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Messages</h1>
                    @foreach($messages as $message)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="list-group">
                                        <li class="list-group-item">
                                            <b>{{$message->email}}:</b>
                                            <br>
                                            {{$message->message}}
                                        </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
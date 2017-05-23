@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Product</div>

                    <div class="panel-body">
                        @if ($errors->count() > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            Product Title:
                            <br />
                            <input type="text" name="title" value="{{ $product->title }}" />
                            <br /><br />
                            Product Description:
                            <br />
                            <textarea  name="description"  rows="7" cols="100">{{$product->description }}</textarea>
                            <br/><br/>
                            Product Price:
                            <br />
                            <input type="text" name="price" value="{{ $product->price }}" />
                            <br/><br/>
                            Product image:
                            <br />
                            <input type="file" name="image" />
                            <br /><br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
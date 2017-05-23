@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    <div class="container">
    <div class="row">
        @can('create', \App\Product::class)
        <div class="col-md-12">
            <a href="{{route('products.create')}}" class="btn btn-primary">Prideti</a>
        </div>
        @endcan

    </div>
    <div class="row">
        @forelse($products as $product)
        <div class="col-md-4 column productbox">
            <img src="/storage/image/{{$product->picture}}" class="img-responsive">
            <div class="producttitle">{{$product->title}}</div>
            <div class="productprice"><div class="pull-right"><a href="/addToCart/{{$product->id}}" class=" cart btn btn-danger btn-sm"  rel="/addToCart/{{$product->id}}" role="button">Uzsakyti</a></div><div class="pricetext">{{$product->price}}</div></div>
            <div>

                @can('update', \App\Product::class)
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-default">Redaguoti</a>
                @endcan

                @can('delete', \App\Product::class)
                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                      style="display: inline"
                      onsubmit="return confirm('Are you sure?');">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button class="btn btn-danger">Istrinti</button>
                </form>
                @endcan
            </div>
        </div>
        @empty


            <div class="col-md-12">
                <h3>No entries found.</h3>
            </div>
        @endforelse

    </div>
    {{ $products->links() }}
</div>

    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
           $('.cart').on('click', function (event) {
               event.preventDefault();

               var options = {
                   url: $(this).attr('rel'),
                   success: function (response) {
                       console.log(response);
                   }
               };
               $.ajax(options);
           });

        });
    </script>


@endsection

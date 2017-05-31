@extends('layouts.app')

@section('content')
<section id="pricing" class="description_content">
    <div class="pricing background_content">
        <h1><span>Affordable</span> pricing</h1>
    </div>
    <div class="text-content container">
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
        <div id="w">
        @forelse($products as $product)
        <div class="col-md-4 column productbox item dinner special">
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
    </div>
    {{ $products->links() }}
</div>
</div>
</section>




@endsection

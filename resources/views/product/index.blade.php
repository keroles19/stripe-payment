@extends('layouts.app')


@section('content')
    <div class="container">


        <section>


            <div class="row">
            @foreach( $products as $product)
                <div class="col-md-4">

                    <div class="card mb-2">
                            <img src="{{ $product->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">Sld on thd make up the bulk of the card's content.</p>
                                <p><strong> $ {{ $product->price }}</strong></p>
{{--                                @if(session()->has('cart'))--}}
{{--                                @if(!key_exists($product->id,session()->get('cart')->items))--}}
                                <a href="{{route('product.buy',$product->id)}}" class="btn btn-primary"> Buy</a>
{{--                                @else--}}
{{--                                    <button class="btn btn-success disabled">Done</button>--}}
{{--                                @endif--}}
{{--                                @endif--}}
                            </div>
                    </div>

                </div>
                @endforeach
            </div>

        </section>
    </div>
@endsection

@extends('common.master')

@section('title')
    My-Cart
@endsection

@section('content')
    @include('common.navbar')

    <div class="jumbotron jumbotron-fluid bg-info my-0 by">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h4 class="display-4">
                            E-Commerce System
                        </h4>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, ad aliquid animi
                            aperiam
                            architecto assumenda debitis deserunt dolor dolorem eaque earum eius eligendi eveniet
                            exercitationem
                            id impedit in inventore iste iure molestiae molestias nulla officiis pariatur placeat quae
                            quam
                            quis
                            quod quos recusandae saepe similique tempore, totam voluptates! Reiciendis, repudiandae!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body mb-0">
                        @if(count($lastOrderDetails) >0)
                            <table class="table-bordered table table-hover mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Amount</th>
                                    <th>Overall</th>
                                    <th>See Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $overallPrice = 0; @endphp
                                @foreach($lastOrderDetails as $k => $item)
                                    @php  $product = isset($item)? $item->product: [];@endphp
                                    @php
                                        $overall = $item->price * $item->amount * (1-$item->discount / 100);
                                        $overall = ceil($overall * 100)/100;
                                        if (isset($overallPrice)) {
                                            $overallPrice+= $overall;
                                        };
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{isset($k)? $k+1: []}}</td>
                                        <td width="35%">{{$product->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->discount}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$overall}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm mb-1"
                                               href="/product/{{$item->Product_id}}/details">
                                                More Details
                                            </a>
                                            <form action="/shopping-cart/delete" method="POST">
                                                @csrf
                                                <input type="hidden" name="product" value="{{$product->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="text-center">
                                    <td colspan="5">Overall Price</td>
                                    <td colspan="2" class="font-weight-bold">{{$overallPrice}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-center mt-3">
                                <button class="btn btn-success">
                                    Checkout
                                </button>
                            </div>
                        @else
                            <div class="alert alert-danger m-0" role="alert">
                                You have no orders for now
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('common.footer')
@endsection

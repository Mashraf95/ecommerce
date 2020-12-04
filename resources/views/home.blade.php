@extends('common.master')

@section('title')
    Home
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


    <div class="jumbotron jumbotron-fluid bg-dark my-0 py-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $k => $slider)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$k}}"
                        class="{{$k == 0 ? "active" : ""}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $k => $slider)
                    <div class="carousel-item {{$k == 0 ? "active" : ""}}">
                        <img src="{{$slider->image ? $slider->image->path : null}}" height="500"
                             class="d-block w-100"
                             alt="{{$slider->title}}">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="card">
                                <div class="card-body text-dark">
                                    <h5 class="h2">{{$slider->title}}</h5>
                                    <p>{{$slider->content}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
               data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
               data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold">
                                    Categories
                                </h5>
                                <hr>
                                <ul class="list-unstyled">
                                    @foreach($cats as $cat)
                                        <li class="text-truncate text-dark mb-1">
                                            <a href="categories/{{$cat ->id}}"
                                               style="outline: none; text-decoration: none; color: black">
                                                <span class="fa fa-caret-right"></span>
                                                <span>{{$cat -> name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="text-truncate text-dark mb-1">
                                        <a href="/categories"
                                           style="outline: none; text-decoration: none; color: cornflowerblue">
                                            <span class="fa fa-caret-right"></span>
                                            <span>See More</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr>
                                <h5 class="card-title text-center font-weight-bold">Popular Tags</h5>
                                <hr>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                                <br>
                                <span class="badge badge-primary badge-primary">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                                <br>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                                <br>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>
                                <span class="badge badge-primary badge-pill">Kids</span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <p class="m-0 text-center font-weight-bold h5">
                                    New Arrivals
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($arrivals as $product)
                        @include('common.product')
                    @endforeach
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="text-center mb-4">
                            <a href="/products/arrivals" style="font-size: 14px; outline: none; text-decoration: none">
                                See More Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <p class="m-0 text-center font-weight-bold h5">
                            Top Sales
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($sales as $product)
                @include('common.product')
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div class="text-center mb-4">
                    <a href="/products/arrivals" style="font-size: 14px; outline: none; text-decoration: none">
                        See More Top Sales
                    </a>
                </div>
            </div>
        </div>
    </div>








    @include('common.footer')
@endsection

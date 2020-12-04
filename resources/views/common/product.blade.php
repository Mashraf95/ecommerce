<div class="col-12 col-md-4 mb-0 mb-md-3">
    <div class="card shadow">
        <img src="{{$product ->image ? $product->image->path: null}}"
             class="card-img-top"
             height="175">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold text-truncate m-0 mb-2">
                {{$product -> name}}
            </h5>
            <div class="text-center">
                <P class="font-italic text-center m-0 text-muted d-block py-1 text-truncate">
                    {{$product ->category ? $product->category->name: "no category"}}
                </P>
            </div>
            <div class="text-center">
                <span class="badge badge-primary badge-pill my-1">
                    Price: {{$product -> selling_price}}
                </span>
                <span class="badge badge-danger badge-pill">
                    Discount: {{$product ->discount}}
                </span>
                <span class="badge badge-dark badge-pill">
                    Amount: {{$product ->amount}}
                </span>
            </div>
            <div>
                <p class="text-truncate">
                    {{$product -> description}}
                </p>
            </div>
            <div class="text-center">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="product" value="{{$product->id}}">
                    <button type="submit" class="btn btn-success btn-block btn-sm">Add to Cart</button>
                </form>
                <a href="#" class="text-center"
                   style="font-size: 14px; outline: none; text-decoration: none">
                    Display Info
                </a>
            </div>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="card shadow mb-2">
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($errors->all() as $error)
                    <li class="text-danger ">
                        <i class="fa fa-stop"></i>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

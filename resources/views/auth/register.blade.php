@extends('common.master')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mx-auto mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        @include('common.errors')
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name" class="col-form-label col-12 col-md-3">First Name *</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('first_name')}}"
                                           name="first_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-form-label col-12 col-md-3">Last Name</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('last_name')}}"
                                           name="last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-form-label col-12 col-md-3">Username *</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('username')}}"
                                           name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-form-label col-12 col-md-3">Email *</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('email')}}"
                                           name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-form-label col-12 col-md-3">Password *</label>
                                <div class="col-12 col-md-9">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-form-label col-12 col-md-3">Gender</label>
                                <div class="col-12 col-md-9">
                                    @php
                                        $genders = \App\Models\Gender::all();
                                    @endphp
                                    <select name="gender" class="form-control">
                                        @foreach($genders as $gender)
                                            @if($gender->id == old('gender'))
                                                <option value="{{$gender ->id}}" selected>
                                                    {{$gender->name}}
                                                </option>
                                            @else
                                                <option value="{{$gender ->id}}">
                                                    {{$gender->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phonenumber" class="col-form-label col-12 col-md-3">Phone Number</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('phonenumber')}}"
                                           name="phonenumber">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-form-label col-12 col-md-3">Address</label>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control"
                                           value="{{old('address')}}"
                                           name="address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bio" class="col-form-label col-12 col-md-3">Bio</label>
                                <div class="col-12 col-md-9">
                                    <textarea name="bio" id="bio" cols="30" rows="3"
                                              class="form-control" {{old('bio')}}></textarea>
                                </div>
                            </div>
                            <div class="text-center mb-2">
                                <button class="btn btn-info" type="submit">
                                    Register
                                </button>
                            </div>
                            <p class="m-0">
                                <span class="text-muted">Have an account ?!</span>
                                <a href="/login">Login</a>
                            </p>
                            <p class="m-0">
                                <span class="text-muted">Return</span>
                                <a href="/home">Home</a>
                            </p>
                            <p class="text-muted">(*)fields are required</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

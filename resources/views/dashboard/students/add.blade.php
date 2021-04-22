@extends('layouts.index')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Student Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
 
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Student</h3>
                            <div class="box-tools float-right">
                                <a href="{{ route('student-list') }}" class="btn btn-success btn-sm btn-flat">Student List</a>
                            </div>
                        </div>
                        <form role="form" action="{{ route('student-add') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="enter name">
                                            @if($errors->has('name'))
                                                <label class="error">{{ $errors->first('name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"  placeholder="Enter email" require>
                                            @if($errors->has('email'))
                                                <label class="error">{{ $errors->first('email') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputMobile">Mobile</label>
                                            <input type="text" class="form-control" id="exampleInputMobile" name="mobile" placeholder="Enter mobile no" require>
                                            @if($errors->has('mobile'))
                                                <label class="error">{{ $errors->first('mobile') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputCity">City</label>
                                            <input type="text" class="form-control" id="exampleInputCity" name="city" placeholder="Enter city" require>
                                            @if($errors->has('city'))
                                                <label class="error">{{ $errors->first('city') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address</label>
                                            <input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address" require>
                                            @if($errors->has('address'))
                                                <label class="error">{{ $errors->first('address') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection

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
                    <li class="breadcrumb-item active">Student Edit</li>
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
                            <h3 class="card-title">Edit Student</h3>
                            <div class="box-tools float-right">
                                <a href="{{ route('student-list') }}" class="btn btn-success btn-sm btn-flat">Student List</a>
                            </div>
                        </div>
                        <form role="form" action="{{ route('student-edit', ['id' => $student->id]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputname">Name</label>
                                            <input type="text" class="form-control" id="exampleInputname" name="name" value="{{ $student->name }}" placeholder="Enter name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $student->email }}"  placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputMobile">Mobile</label>
                                            <input type="text" class="form-control" id="exampleInputMobile" name="mobile" value="{{ $student->mobile }}" placeholder="Enter mobile no">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputCity">City</label>
                                            <input type="text" class="form-control" id="exampleInputCity" name="city" value="{{ $student->city }}" placeholder="Enter city">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address</label>
                                            <input type="text" class="form-control" id="exampleInputAddress" name="address" value="{{ $student->address }}" placeholder="Enter address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection

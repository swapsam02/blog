@extends('layouts.index')

@section('content')
<div class="content-wrapper">
    @if(Session::has('msg'))
        <div id="flashDivId" class="alert alert-{{ Session::get('alert-class', 'success') }}" onclick="$(this).slideUp();" style="border-radius:unset;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('msg') }}</strong>
        </div>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Education</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Education</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
 
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <h3 class="card-title">Education List</h3>
                        <div class="box-tools float-right">
                            <a href="{{ route('education-add') }}" class="btn btn-success btn-sm btn-flat">Add</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="8%">Sr No.</th>
                                    <th>Student Name</th>
                                    <th>University</th>
                                    <th>College</th>
                                    <th>Branch</th>
                                    <th>Semester</th>
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($educations as $education)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $education->student->name }}</td>
                                    <td>{{ $education->university }}</td>
                                    <td>{{ $education->college }}</td>
                                    <td>{{ $education->branch }}</td>
                                    <td>{{ $education->semester }}</td>
                                    <td>
                                        <a href="" class="btn btn-outline-success btn-sm btn-flat">Edit</a>
                                        <a href="" class="btn btn-outline-danger btn-sm btn-flat">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection

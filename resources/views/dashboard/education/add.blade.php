@extends('layouts.index')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Education</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Education Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
 
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add education details</h3>
                            <div class="box-tools float-right">
                                <a href="{{ route('education-list') }}"><button class="btn btn-success btn-sm btn-flat"> Back</button></a>
                            </div>
                        </div>
                        <form role="form" id="" method="post" action="{{ route('education-add') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Student</label>
                                            <select class="form-control select2" style="width: 100%;" name="student_id">
                                                <option selected="selected">select student</option>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('student_id'))
                                                <label class="error">{{ $errors->first('student_id') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="university">University</label><b> *</b>
                                            <input type="text" class="form-control" id="university" name="university" placeholder="Enter university">
                                            @if ($errors->has('university'))
                                                <label class="error">{{ $errors->first('university') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="college">College</label><b> *</b>
                                            <input type="text" class="form-control" id="college" name="college" placeholder="Enter college">
                                            @if ($errors->has('college'))
                                                <label class="error">{{ $errors->first('college') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="branch">Branch</label><b> *</b>
                                            <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter branch">
                                            @if ($errors->has('branch'))
                                                <label class="error">{{ $errors->first('branch') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="semester">Semester</label><b> *</b>
                                            <select class="form-control select2" style="width: 100%;" name="semester">
                                                <option selected="selected">select semester</option>
                                                @foreach(Config::get('constant.semesters') as $semester)
                                                    <option value="{{ $semester }}">{{ $semester }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('semester'))
                                                <label class="error">{{ $errors->first('semester') }}</label>
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

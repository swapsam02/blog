<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUservice\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Student;
use Session;

class StudentController extends Controller
{
    public function __construct(Student $student)
    {
        $this->exception = 'home';
        $this->student = $student;
    }

    public function index()
    {
        try{
            $students = $this->student->getAllStudentList();
            return view('dashboard.students.index', compact('students'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function add(Request $request)
    {
        try{
            if($request->isMethod('post')){
                $validator = $this->getValidateStudent($request->all());
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if($this->student->saveStudent($request)){
                    Session::flash('msg','Student successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('student-list');
                }else{
                    Session::flash('msg','Unable to add student.');
                    Session::flash('alert-class','danger');
                }
            }
            return view('dashboard.students.add');
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function edit(Request $request, $id)
    {
        try{
            $student = Student::findOrfail($id);
            if($request->isMethod('post')){
                if($this->student->editStudent($student, $request)){
                    return redirect()->route('student-list');
                }
            }
            return view('dashboard.students.edit', compact('student'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function studentDelete($sid)
    {
        try{
            Student::where('id', $sid)->update(['is_deleted' => 1]);
            return redirect()->route('student-list');
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    protected function getValidateStudent($data)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'address' => 'required'
        ];
        $errmsg = [
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'mobile.required' => 'Please enter mobile',
            'city.required' => 'Please enter city',
            'address.required' => 'Please enter address',
        ];
        return Validator::make($data, $rules, $errmsg);
    }
}

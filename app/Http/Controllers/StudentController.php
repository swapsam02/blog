<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUservice\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Student;

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
            return view('dashboard.students.index');
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
                    return redirect()->route('student-list');
                }
            }
            return view('dashboard.students.add');
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    protected function getValidateStudent($data)
    {
        $rule = [
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
        return Validator::make($rule, $errmsg, $data);
    }
}

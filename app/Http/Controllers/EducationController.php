<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\PayUservice\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Student;
use App\Education;
use Session;

class EducationController extends Controller
{
    public function __construct(Education $education, Student $student)
    {
        $this->exception = 'home';
        $this->education = $education;
        $this->student = $student;
    }

    public function index()
    {
        try{
            $educations = $this->education->getAllEducationList();
            return view('dashboard.education.index', compact('educations'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function add(Request $request)
    {
        try{
            if($request->isMethod('post')){
                $validator = $this->getValidateEducation($request->all());
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if($this->education->saveEducation($request)){
                    Session::flash('msg','Education successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('education-list');
                }else{
                    Session::flash('msg','Unable to add education.');
                    Session::flash('alert-class','danger');
                }
            }
            $students = $this->student->getAllStudentList();
            return view('dashboard.education.add', compact('students'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    protected function getValidateEducation($data)
    {
        $rules = [
            'student_id' => 'required',
            'university' => 'required',
            'college' => 'required',
            'branch' => 'required',
            'semester' => 'required'
        ];
        $errmsg = [
            'student_id.required' => 'Please select name',
            'university.required' => 'Please enter university',
            'college.required' => 'Please enter college',
            'branch.required' => 'Please enter branch',
            'semester.required' => 'Please select semester',
        ];
        return Validator::make($data, $rules, $errmsg);
    }
}

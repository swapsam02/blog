<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile', 'city', 'address',
    ];

    public function saveStudent(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'email', 'mobile', 'city', 'address');
        $saveResult = Student::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }
}

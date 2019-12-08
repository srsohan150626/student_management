<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\MyClass;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function getManageCourse()
    {
       $programs = Program::all();
       $shift=Shift::all();
       $time =Time::all();
       $batch= Batch::all();
       $group =Group::all();
       $academics = Academic::orderBy('academic_id','DESC')->get();
        return view('courses.manageCourse',compact('programs','academics','shift','time','batch','group'));
    }

    public function postInsertAcademic(Request $request)
    {
      if($request->ajax())
      {
       return response(Academic::create($request->all()));
      }
    }

    public function PostInsertProgram(Request $request)
    {
      if($request->ajax())
      {
        return response(Program::create($request->all()));
      }
    }


    //shift
    public function createShift(Request $request)
    {
      if($request->ajax())
      {
        return response(Shift::create($request->all()));
      }
    }
    //time
    public function createTime(Request $request)
    {
      if($request->ajax())
      {
        return response(Time::create($request->all()));
      }
    }
    //batch
    public function createBatch(Request $request)
    {
      if($request->ajax())
      {
        return response(Batch::create($request->all()));
      }
    }
    //group
    public function createGroup(Request $request)
    {
      if($request->ajax())
      {
        return response(Group::create($request->all()));
      }
    }
    //class
    public function createCourse(Request $request)
    {
      if($request->ajax())
      {
        return response(MyClass::create($request->all()));
      }
    }

    public function showClassInformation(Request $request)
    {

      $classes=$this->ClassInformation()->get();
      return view('class.classInfo',compact('classes'));
    }
    public function ClassInformation()
    {

      return MyClass::join('academics','academics.academic_id','=','classes.academic_id')
      ->join('programs','programs.program_id','=','classes.program_id')
      ->join('shifts','shifts.shift_id','=','classes.shift_id')
      ->join('times','times.time_id','=','classes.time_id')
      ->join('batches','batches.batch_id','=','classes.batch_id')
      ->join('groups','groups.group_id','=','classes.group_id')
      ->orderBy('classes.class_id','DESC');
    }
    //delete class
    public function deleteClass(Request $request)
    {
      if($request->ajax())
      {
        MyClass::destroy($request->class_id);
      }
    }
    //edit class
    public function editClass(Request $request)
    {
      if($request->ajax())
      {
        return response(MyClass::find($request->class_id));
      }
    }
    //update Class info
    public function updateClassInfo(Request $request)
    {
      if($request->ajax())
      {
        return response(MyClass::updateOrCreate(['class_id'=>$request->class_id],$request->all()));
      }
    }
}

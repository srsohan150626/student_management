<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);


Route::group(['middleware'=>['authen']],function(){


    Route::get('logout','LoginController@getLogout')->name('logout');
    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');

});

Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){
    Route::get('/manage/course','CourseController@getManageCourse')->name('manageCourse');
    Route::post('/manage/course/insert',['as'=>'postInsertAcademic','uses'=>'CourseController@postInsertAcademic']);
    Route::post('/manage/course/insert-program',['as'=>'PostInsertProgram','uses'=>'CourseController@PostInsertProgram']);

    Route::post('/manage/course/shift',['as'=>'createShift','uses'=>'CourseController@createShift']);
    Route::post('/manage/course/time',['as'=>'createTime','uses'=>'CourseController@createTime']);
    Route::post('/manage/course/batch',['as'=>'createBatch','uses'=>'CourseController@createBatch']);
    Route::post('/manage/course/group',['as'=>'createGroup','uses'=>'CourseController@createGroup']);
    Route::post('/manage/course/class',['as'=>'createCourse','uses'=>'CourseController@createCourse']);
    Route::get('/manage/course/classinfo',['as'=>'showClassInformation','uses'=>'CourseController@showClassInformation']);
    Route::post('/manage/course/class/delete',['as'=>'deleteClass','uses'=>'CourseController@deleteClass']);
    Route::get('/manage/course/class/edit',['as'=>'editClass','uses'=>'CourseController@editClass']);
    Route::post('/manage/course/class/update',['as'=>'updateClassInfo','uses'=>'CourseController@updateClassInfo']);

    //student Register
    Route::get('/student/getregister',['as'=>'getStudentRegister','uses'=>'StudentController@getStudentRegister']);
    Route::post('/student/postregister',['as'=>'postStudentRegister','uses'=>'StudentController@postStudentRegister']);
    Route::get('/student/info',['as'=>'studentInfo','uses'=>'StudentController@studentInfo']);

    //Fee
    Route::get('/student/show/payment',['as'=>'getPayment','uses'=>'FeeController@getPayment']);
    Route::get('/student/payment',['as'=>'showStudentPayment','uses'=>'FeeController@showStudentPayment']);
    Route::get('/student/go/to/payment/{student_id}',['as'=>'goPayment','uses'=>'FeeController@goPayment']);
    Route::post('/student/payment/save',['as'=>'savePayment','uses'=>'FeeController@savePayment']);
    Route::post('/fee/create',['as'=>'createFee','uses'=>'FeeController@createFee']);
    Route::get('/fee/student/pay',['as'=>'pay','uses'=>'FeeController@pay']);

    Route::get('/fee/student/print/invoice/{receipt_id}',['as'=>'printInvoice','uses'=>'FeeController@printInvoice']);


    Route::get('/fee/student/transaction/delete/{transact_id}',['as'=>'deleteTransact','uses'=>'FeeController@deleteTransact']);
    Route::get('/fee/student/show/program',['as'=>'showProgramStudent','uses'=>'FeeController@showProgramStudent']);
    Route::get('/fee/student/show/program',['as'=>'showProgramStudent','uses'=>'FeeController@showProgramStudent']);
    //route test
    Route::get('/fee/report',['as'=>'getFeeReport','uses'=>'FeeController@getFeeReport']);
    Route::get('/fee/show/fee-report',['as'=>'showFeeReport','uses'=>'FeeController@showFeeReport']);

    //student report
    Route::get('/report/student-list',['as'=>'getStudentList','uses'=>'ReportController@getStudentList']);
    Route::get('/report/student-info',['as'=>'showStudentInfo','uses'=>'ReportController@showStudentInfo']);
    Route::get('/report/student-multi-class',['as'=>'getStudentListMultiClass','uses'=>'ReportController@getStudentListMultiClass']);
    Route::get('/report/student-info-multi-class',['as'=>'showStudentInfoMultiClass','uses'=>'ReportController@showStudentInfoMultiClass']);
    Route::get('/student/new/register',['as'=>'getNewstudentRegister','uses'=>'ReportController@getNewstudentRegister']);

});

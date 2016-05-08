<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//support employee
use App\Models\Employee;
use App\Models\EmployeeDegree;
use Datatables;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Http\Requests\Admin\EmployeeEditRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Helpers\Thumbnail;

class EmployeeController extends Controller
{
    /**
     * Initializer. 
     *
     * @return \AdminController
     */
    public function __construct()
    { 
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       if(Auth::user()->admin  == 0) {  //check permission
             return redirect('home');
        } 
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        return view('admin.employee.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(EmployeeRequest $request) {

        $employee = new Employee ;
        
        $employee -> name = $request->name;
	$employee -> code = $request->code;
        $employee -> birthday = ($request->birthday != '') ? str_replace('/','-',$request->birthday) : null;
        $employee -> start_date = ($request->start_date != '') ? str_replace('/','-',$request->start_date) : null;
        $employee -> address = $request->address;
        $employee -> email = $request->email;
        $employee -> sex = $request->sex;
        $employee -> telephone = $request->telephone;
        $employee -> nationality = $request->nationality;
        
        //save picture db
        $picture = '';
         if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $employee -> photo = $picture;
        
        $employee -> save();

        //save file
         if($request->hasFile('photo'))
        {
            $destinationPath = public_path() . '/upload/';
            $request->file('photo')->move($destinationPath, $picture);

            $path2 = public_path() . '/upload/thumbs/';
            Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);

        }
        
        //save degree
        foreach($request->year as $k => $val) {
            $degree = new EmployeeDegree ;
            if((int)$request->year[$k] > 0 && $request->degree[$k] != '' && $request->school[$k] != '' ) {
                
                $degree -> year = $request->year[$k];
                $degree -> degree = $request->degree[$k];
                $degree -> school = $request->school[$k];
                $degree -> employee_id = $employee->id;
                $degree -> save();
            }
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {

        $employee = Employee::find($id);
        $degree = EmployeeDegree::where('employee_id', $id)->get();
     
        return view('admin.employee.create_edit', compact('employee','degree'));
    }
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getView($id) {

        $employee = Employee::find($id);
        $degree = EmployeeDegree::where('employee_id', $id)->get();
     
        return view('admin.employee.view', compact('employee','degree'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(EmployeeEditRequest $request, $id) {

        $employee =  Employee::find($id);
        $employee -> name = $request->name;
        $employee -> birthday = ($request->birthday != '') ? str_replace('/','-',($request->birthday)) : null;
        $employee -> start_date = ($request->start_date != '') ? str_replace('/','-',$request->start_date) : null;
        $employee -> address = $request->address;
        $employee -> email = $request->email;
        $employee -> photo = $request->photo;
        $employee -> sex = $request->sex;
        $employee -> telephone = $request->telephone;
        $employee -> nationality = $request->nationality;
        
         //save picture db
        $picture = '';
         if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $employee -> photo = $picture;
        
        $employee -> save();

        //save file
         if($request->hasFile('photo'))
        {
            $destinationPath = public_path() . '/upload/';
            $request->file('photo')->move($destinationPath, $picture);

            $path2 = public_path() . '/upload/thumbs/';
            Thumbnail::generate_image_thumbnail($destinationPath . $picture, $path2 . $picture);

        }
        
         //save degree
        
        $affectedRows = EmployeeDegree::where('employee_id', '=', $id)->delete();
        $degree = new EmployeeDegree ;
        foreach($request->year as $k => $val) {
            if((int)$request->year[$k] > 0  ) {
                
                $degree -> year = $request->year[$k];
                $degree -> degree = $request->degree[$k];
                $degree -> school = $request->school[$k];
                $degree -> employee_id = $id;
                $degree -> save();
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    
     /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

    public function getDelete($id)
    {
        $employee = Employee::find($id);
        // Show the page
        return view('admin.employee.delete', compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $employee= Employee::find($id);
        $employee->delete();
    }
    
     /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON 
     */
    public function data()
    {  
        $employee = Employee::select(array('employee.id','employee.code','employee.name','employee.birthday','employee.email','employee.sex', 'employee.created_at'))
                ->orderBy('employee.created_at', 'DESC');;
        if(Auth::user()->admin  == 1) { //check permission
            return Datatables::of($employee)
                ->edit_column('birthday','{{str_replace("-","/",$birthday)}}')    
                ->edit_column('created_at','{{date("Y/m/d H:i",  strtotime($created_at))}}')  
                ->add_column('actions', '<a href="{{{ URL::to(\'admin/employee/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                        <a href="{{{ URL::to(\'admin/employee/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                        <a href="{{{ URL::to(\'admin/employee/\' . $id . \'/view\' ) }}}" class="btn btn-sm btn-info iframe"><span class="glyphicon glyphicon-book"></span> {{ trans("admin/modal.view") }}</a>
                    ')
                ->remove_column('id')

            ->make();
        } else if(  Auth::user()->admin  == 3){
            return Datatables::of($employee)
                ->edit_column('birthday','{{str_replace("-","/",$birthday)}}')   
                ->edit_column('created_at','{{date("Y/m/d H:i",  strtotime($created_at))}}')  
                ->add_column('actions','<a href="{{{ URL::to(\'admin/employee/\' . $id . \'/view\' ) }}}" class="btn btn-sm btn-info iframe"><span class="glyphicon glyphicon-book"></span> {{ trans("admin/modal.view") }}</a> ')
                ->remove_column('id')

            ->make();
        }
        else if(  Auth::user()->admin  == 2){
            return Datatables::of($employee)
                ->edit_column('birthday','{{str_replace("-","/",$birthday)}}')     
                ->edit_column('created_at','{{date("Y/m/d H:i",  strtotime($created_at))}}')  
                ->add_column('actions', '<a href="{{{ URL::to(\'admin/employee/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                        <a href="{{{ URL::to(\'admin/employee/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                        
                    ')
                ->remove_column('id')

            ->make();
        }
    }
}

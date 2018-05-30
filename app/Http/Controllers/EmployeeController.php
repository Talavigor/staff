<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Support\Facades\View;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('app');
    }

   public function getPeople(){

$result = Employee::get(['id', 'name', 'parent_id', 'position']);

       foreach($result as $row)
       {
           $people = $row->position.' : '.$row->name;
           $sub_data["id"] = $row->id;
           $sub_data["text"] = $people;
           $sub_data["parent_id"] = $row->parent_id;
           $data[] = $sub_data;
       }
       foreach($data as $key => &$value)
       {
           $output[$value["id"]] = &$value;
       }
       foreach($data as $key => &$value)
       {
           if($value["parent_id"] && isset($output[$value["parent_id"]]))
           {
               $output[$value["parent_id"]]["nodes"][] = &$value;
           }
       }
       foreach($data as $key => &$value)
       {
           if($value["parent_id"] && isset($output[$value["parent_id"]]))
           {
               unset($data[$key]);
           }
       }
       $staff= json_encode($data);
       $staff = preg_replace("_\\\_", "\\\\\\", $staff);
       $staff = preg_replace("/\"/", "\\\"", $staff);
       return View::make('staff.employee')
           ->with('tree', $staff);
   }
}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 500;
        if ($request->date == 'date_up') {
            $sort = Employee:: orderBy('employment_date', 'asc')->paginate($paginate);
        } elseif ($request->date == 'date_down') {
            $sort = Employee:: orderBy('employment_date', 'desc')->paginate($paginate);
        } elseif ($request->date == 'name_up') {
            $sort = Employee:: orderBy('name', 'asc')->paginate($paginate);
        } elseif ($request->date == 'name_down') {
            $sort = Employee:: orderBy('name', 'desc')->paginate($paginate);
        } elseif ($request->date == 'salary_up') {
            $sort = Employee:: orderBy('salary', 'asc')->paginate($paginate);
        } elseif ($request->date == 'salary_down') {
            $sort = Employee:: orderBy('salary', 'desc')->paginate($paginate);
        } elseif ($request->date == 'position_up') {
            $sort = Employee:: orderBy('position', 'asc')->paginate($paginate);
        } elseif ($request->date == 'position_down') {
            $sort = Employee:: orderBy('position', 'desc')->paginate($paginate);
        }else {
            $sort = Employee:: paginate($paginate);
        }

        return view('sort', ['sort' => $sort]);
    }


    public function search(Request $request)
    {
        $len = mb_strlen($request->search, 'UTF-8');
        if ($len > 3) {
            if ($request->ajax()) {
                $output = "";

                $employees = DB::table('employees')->where('name', 'LIKE', '%' . $request->search . "%")->
                orWhere('position', 'LIKE', '%' . $request->search . "%")->
                orWhere('salary', 'LIKE', '%' . $request->search . "%")->paginate(500);

                if ($employees) {
                    foreach ($employees as $key => $employee) {
                        $output .= '<tr>' .

                            '<td>' . $employee->id . '</td>' .

                            '<td>' . $employee->name . '</td>' .

                            '<td>' . $employee->position . '</td>' .

                            '<td>' . $employee->salary . '</td>' .

                            '</tr>';
                    }
                    return Response($output);
                }
            }
        }
    }
}

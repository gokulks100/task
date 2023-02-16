<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class employeeController extends Controller
{
    public function getData()
    {
        $inv = Employee::query();

        return DataTables::of($inv)->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'gender' => "required",
            'phone' => 'required'
          
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'errorMsg' => $validator->errors()->first()];
        }

        DB::beginTransaction();
        try {
            $data = $request->all();
            unset($data['id']);
            $id = ['id' => $request->id];
            Employee::updateOrCreate($id, $data);
            DB::commit();
            return ['success' => true];
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            Log::debug($e);
            return ['success' => false, 'errorMsg' => 'somethin went wrong'];
        }
    }

    public function getInvoiceById(Request $request)
    {
        return  Employee::find($request->id);
    }

    public function delete(Request $request)
    {
        try {
            $inv = Employee::find($request->id);
            if (isset($inv)) {
                $inv->delete();
                return ['success'=>true];
            } else {
                return ['success' => false, 'errorMsg' => 'already deleted'];
            }
        } catch (Exception $e) {
            Log::debug($e);
            return ['success' => false, 'errorMsg' => $e->getMessage()];
        }
    }
}

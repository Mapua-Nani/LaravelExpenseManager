<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index(){
        $expensecategories = ExpenseCategory::all();
        return view('expensecategory')->with('expensecategories', $expensecategories);
    }

    public function addexpensecategory(Request $request) {
        $expensecategory = ExpenseCategory::create($request->all());
        return response()->json($expensecategory);
    }

    public function editexpensecategory($expensecategory_id) {
        $expensecategory = ExpenseCategory::find($expensecategory_id);
        return response()->json($expensecategory);
    }

    public function updateexpensecategory(Request $request, $expensecategory_id) {
        // $expcat = new ExpenseCategory
        $expensecategory = ExpenseCategory::find($expensecategory_id);
        $expensecategory->name = $request->name;
        $expensecategory->description = $request->description;
        //$expensecategory->created_by_id = $request;
        $expensecategory->save();
        return response()->json($expensecategory);
    }

    public function deleteexpensecategory($expensecategory_id) {
        $expensecategory = ExpenseCategory::destroy($expensecategory_id);
        return response()->json($expensecategory);
    }
}

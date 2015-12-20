<?php

namespace App\Http\Controllers;

use App\AdminFunction;
use App\AdminFunctionType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class AdminFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $functions = AdminFunction::all();
        return view('admin.functions.list', compact('functions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $function_types = AdminFunctionType::all();

        return view('admin.functions.create', compact('function_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = (array)$request->all();
        AdminFunction::create($input);
        $functions = AdminFunction::all();

        return view('admin.functions.list', compact('functions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $function_types = AdminFunctionType::all();
        $function = AdminFunction::find($id);

        return view('admin.functions.edit', compact('function', 'function_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $function = AdminFunction::find($id);
        $function->name = $request->name;
        $function->admin_function_type_id = $request->admin_function_type_id;
        $function->save();

        return redirect('admin/function');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $function = AdminFunction::find($id);
        $function->delete();

        return redirect('admin/function');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteMultipleItems(Request $request){

        AdminFunction::destroy($request->checkboxes);
        return redirect('admin/function');
    }
}

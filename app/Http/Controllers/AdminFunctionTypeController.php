<?php

namespace App\Http\Controllers;

use App\AdminFunctionType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class AdminFunctionTypeController extends Controller
{
    private $adminFunctionType;

    /**
     * Using service container in constructor to instantiate a class
     *
     * @param AdminFunctionType $adminFunctionType
     */
    public function __construct(AdminFunctionType $adminFunctionType)
    {
        $this->adminFunctionType = $adminFunctionType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $function_types = $this->adminFunctionType->all();
        return view('admin.functions.type_list', compact('function_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.functions.type_create');
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
        $this->adminFunctionType->create($input);
        return $this->index();
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
        $function_type = $this->adminFunctionType->find($id);
        return view('admin.functions.type_edit', compact('function_type'));
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
        $function_type = $this->adminFunctionType->find($id);
        $function_type->name = $request->name;
        $function_type->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $function_type = $this->adminFunctionType->find($id);
        $function_type->delete();
        return redirect('admin/function_type');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteMultipleItems(Request $request){

        $this->adminFunctionType->destroy($request->checkboxes);
        return redirect('admin/function_type');
    }
}

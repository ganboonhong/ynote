<?php

namespace App\Http\Controllers;

use App\AdminFunctionType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\AdminListInterface;

class AdminFunctionTypeController extends Controller implements AdminListInterface
{
    private $adminFunctionType;
    private $user;

    /**
     * Using service container in constructor to instantiate a class
     *
     * @param AdminFunctionType $adminFunctionType
     */
    public function __construct(AdminFunctionType $adminFunctionType)
    {
        $this->adminFunctionType = $adminFunctionType;
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $function_types = $this->user->functionTypes()->get();

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
        $input['user_id'] = $this->user->user_id;
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
        $input = (array)$request->all();
        $input['user_id'] = $this->user->user_id;
        $this->adminFunctionType->find($id)->update($input);

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
        $this->adminFunctionType->find($id)->delete();

        return $this->index();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteMultipleItems(Request $request){

        $this->adminFunctionType->destroy($request->checkboxes);

        return $this->index();
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\AdminListInterface;
use Illuminate\Support\Facades\Input;

include 'Cloudinary/src/Cloudinary.php';
include 'Cloudinary/src/Uploader.php';
include 'Cloudinary/src/settings.php';

class UserController extends Controller implements AdminListInterface
{

    private $destinationPath;

    public function __construct()
    {
        $this->destinationPath = 'uploads';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $privileges = DB::table('privileges')->orderBy('id', 'desc')->get();

        return view('admin.user.create', compact('privileges'));
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

        if($request->hasFile('pic')){
            $pic            = $request->file('pic');
            $rawFileName    = rand(111111, 999999);
            $extension      = $pic->getClientOriginalExtension();
            $fileName       = $rawFileName. '.' .$extension;

            Input::file('pic')->move($this->destinationPath, $fileName);

            //Cloudinary related
            $default_upload_options     = array("tags" => "basic_sample");
            $cloudinary_api_response    = \Cloudinary\Uploader::upload(
                public_path().'/'.$this->destinationPath.'/'.$fileName,
                array_merge($default_upload_options, array("public_id" => $rawFileName))
            );

            $input['cloudinary_api_response'] = json_encode($cloudinary_api_response);
            $input['pic'] = $fileName;
        }

        $user = User::create($input);
        $user->password = bcrypt($request->password);
        $user->save();

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
        $user = User::find($id);
        $privileges = DB::table('privileges')->get();

        return view('admin.user.edit', compact('user', 'privileges'));
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
        $user           = User::find($id);

        /*$user->name     = $request->name;
        $user->email    = $request->email;
        $user->level    = $request->level;*/

        $input = (array)$request->all();

        if( $request->password != "")
        {
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('pic')){
            $pic            = $request->file('pic');
            $rawFileName    = rand(111111, 999999);
            $extension      = $pic->getClientOriginalExtension();
            $fileName       = $rawFileName. '.' .$extension;

            Input::file('pic')->move($this->destinationPath, $fileName);

            //Cloudinary related
            $default_upload_options     = array("tags" => "basic_sample");
            $cloudinary_api_response    = \Cloudinary\Uploader::upload(
                public_path().'/'.$this->destinationPath.'/'.$fileName,
                array_merge($default_upload_options, array("public_id" => $rawFileName))
            );

            $input['cloudinary_api_response'] = json_encode($cloudinary_api_response);
            $input['pic'] = $fileName;

        }else{
            unset($input['cloudinary_api_response']);
            unset($input['pic']);
        }

        $user->update($input);

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
        User::find($id)->delete();

        return $this->index();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteMultipleItems(Request $request)
    {
        User::destroy($request->checkboxes);

        return $this->index();
    }
}

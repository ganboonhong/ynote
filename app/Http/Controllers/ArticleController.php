<?php

namespace App\Http\Controllers;

use App\AdminFunctionType;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Tests\Input\ArgvInputTest;

use Validator;
use Redirect;
use Session;

require 'Cloudinary.php';
require 'Uploader.php';

\Cloudinary::config(array(
    "cloud_name" => "xxxxx",
    "api_key" => "xxxxxxxxxx",
    "api_secret" => "_xxxxxxxxxxxxxx"
));


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.list', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $function_types = AdminFunctionType::all();

        return view('admin.article.create', compact('categories', 'function_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = "";

        if($request->list_pic != ""){
            $destinationPath = 'uploads'; // upload path
            $extension = Input::file('list_pic')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('list_pic')->move($destinationPath, $fileName); // uploading file to given path

            $localhostIP = array("127.0.0.1", "::1");

            if(!in_array($_SERVER['REMOTE_ADDR'], $localhostIP)){

                $cloudinary_api_response = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]['tmp_name']);
            }
        }

        $input = (array)$request->all();
        $input['user_id'] = Auth::user()->user_id;
        $input['list_pic'] = $fileName;

        if(!in_array($_SERVER['REMOTE_ADDR'], $localhostIP)){
            $cloudinary_api_response = \Cloudinary\Uploader::upload("/uploads/$fileName");
            $input['cloudinary_api_response'] = $cloudinary_api_response;
        }

        $article = Article::create($input);
        $article->save();

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
        $article = Article::where('visible', 'Y')
            ->where('admin_function_type_id', '1')  //部落格
            ->findOrFail($id);
        $categories = Category::all();

        return view('frontend.article.detail', compact('article', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        $function_types = AdminFunctionType::all();

        return view('admin.article.edit', compact('article', 'categories', 'function_types'));
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

        if(Input::file('list_pic') != ""){
            $destinationPath = 'uploads'; // upload path
            $extension = Input::file('list_pic')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('list_pic')->move($destinationPath, $fileName); // uploading file to given path
        }

        $input = (array)$request->except('_token');

        if(Input::file('list_pic')!=""){
            $input['list_pic'] = $fileName;
        }else{
            unset($input['list_pic']);
        }

        $input['user_id'] = Auth::user()->user_id;
        Article::where('article_id', $id)->update($input);

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
        Article::find($id)->delete();
        return $this->index();
    }

    public function deleteMultipleItems(Request $request)
    {
        Article::destroy($request->checkboxes);
        return $this->index();
    }

    public function itemList(){

        $articles = Article::where('visible', 'Y')
            ->where('version_cht', 'Y')
            ->where('admin_function_type_id', '1')
            ->get();

        $categories = Category::all();

        return view('frontend.article.list', compact('articles', 'categories'));
    }

    public function itemListWithCategory($id){
        $articles = Article::where('visible', 'Y')
            ->where('version_cht', 'Y')
            ->where('category_id', $id)
            ->get();

        $selected_category = Category::findOrFail($id);
        $categories = Category::all();

        return view('frontend.article.list', compact('articles', 'selected_category', 'categories'));
    }
}

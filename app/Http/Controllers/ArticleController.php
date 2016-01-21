<?php

namespace App\Http\Controllers;

use App\AdminFunctionType;
use App\Article;
use App\Category;
use App\User;
use Askaoru\LaravelCloudinary\Facades\Cloudinary;
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
use App\AdminListInterface;

include 'Cloudinary/src/Cloudinary.php';
include 'Cloudinary/src/Uploader.php';
include 'Cloudinary/src/settings.php';


class ArticleController extends Controller implements AdminListInterface
{
    private $article;
    private $user;
    private $blog;
    private $destinationPath;

    /**
     * Using service container in constructor to instantiate a class
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->user = Auth::user();
        $this->blog = AdminFunctionType::where('code', 'blog')->select('admin_function_type_id')->first();
        $this->destinationPath = 'uploads';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->user->articles()->orderBy('sort', 'desc')->get();

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
            $extension      = Input::file('list_pic')->getClientOriginalExtension(); // getting image extension
            $rawFileName    = rand(11111,99999);
            $fileName       = $rawFileName.'.'.$extension; // renameing image
            Input::file('list_pic')->move($this->destinationPath, $fileName); // uploading file to given path

            // Cloudinary related
            $default_upload_options = array("tags" => "basic_sample");
            $cloudinary_api_response = \Cloudinary\Uploader::upload(
                public_path().'/uploads/'.$fileName,
                array_merge($default_upload_options, array("public_id" => $rawFileName))
            );
        }

        $input = (array)$request->all();
        $input['user_id'] = Auth::user()->user_id;
        $input['list_pic'] = $fileName;
        $input['cloudinary_api_response'] = json_encode($cloudinary_api_response);

        $this->article->create($input);

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
        $article = $this->user->articles()
            ->where('visible', 'Y')
            ->where('admin_function_type_id', $this->blog->admin_function_type_id)
            ->orderBy('sort', 'desc')
            ->findOrFail($id);
        $categories = $this->user->categories()->get();

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
        $article = $this->article->find($id);
        $categories = $this->user->categories()->get();
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

        $input = (array)$request->except('_token');

        if(Input::file('list_pic') != ""){
            $extension          = Input::file('list_pic')->getClientOriginalExtension(); // getting image extension
            $rawFileName        = rand(11111,99999);
            $fileName           = $rawFileName.'.'.$extension; // renameing image
            Input::file('list_pic')->move($this->destinationPath, $fileName); // uploading file to given path

            //Cloudinary related
            $default_upload_options     = array("tags" => "basic_sample");
            $cloudinary_api_response    = \Cloudinary\Uploader::upload(public_path().'/uploads/'.$fileName,
                array_merge($default_upload_options, array("public_id" => $rawFileName)));

            $input['cloudinary_api_response'] = json_encode($cloudinary_api_response);
            $input['list_pic'] = $fileName;
        }else{
            unset($input['list_pic']);
            unset($input['cloudinary_api_response']);
        }

        $input['user_id'] = Auth::user()->user_id;
        $this->article->where('article_id', $id)->update($input);

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
        $this->article->find($id)->delete();

        return $this->index();
    }

    public function deleteMultipleItems(Request $request)
    {
        $this->article->destroy($request->checkboxes);

        return $this->index();
    }

    public function itemList($user_id)
    {
        $user = User::find($user_id);

        $articles = $this->user->articles()
            ->where('visible', 'Y')
            ->where('version_cht', 'Y')
            ->where('admin_function_type_id', $this->blog->admin_function_type_id)
            ->orderBy('sort', 'desc')
            ->get();

        $categories = $this->user->categories()->orderBy('name')->get();

        return view('frontend.article.list', compact('articles', 'categories', 'user'));
    }

    public function itemListWithCategory($user_id, $id)
    {
        $user = User::find($user_id);

        $articles = $this->user->articles()->where('visible', 'Y')
            ->where('version_cht', 'Y')
            ->where('category_id', $id)
            ->orderBy('sort', 'desc')
            ->get();

        $selected_category = Category::findOrFail($id);
        $categories = $this->user->categories()->orderBy('name')->get();

        return view('frontend.article.list', compact('articles', 'selected_category', 'categories', 'user'));
    }
}

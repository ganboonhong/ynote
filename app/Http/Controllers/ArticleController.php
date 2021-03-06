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
use Illuminate\Support\Facades\Route;
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
    private $categories;
    private $article_index_url;
    private $article_amount;
    private $total;
    private $route_parameter;

    /**
     * Using service container in constructor to instantiate a class
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->blog = AdminFunctionType::where('code', 'blog')->select('admin_function_type_id')->first();
        $this->destinationPath = 'uploads';

        if( Auth::user() != ""){
            $this->user = Auth::user();
        }else{
            $this->route_parameter = Route::current()->parameters();
            $this->user = User::findOrFail($this->route_parameter['user_id']);
        }

        $this->categories = $this->user->categories()->orderBy('name')->get();
        $this->article_index_url = 'admin/article';

        foreach( $this->categories as $category){
            $this->article_amount[$category->category_id] = $category->articles()->count();
            $this->total += $category->articles()->count();
        }

        $this->article_amount['total'] = $this->total;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = $this->user->articles()->orderBy('sort', 'desc')->get();
        $user = $this->user;
        
        if($request->ajax()) return response()->json($articles);

        return view('admin.article.list', compact('articles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories;
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

        $input = (array)$request->all();
        $input['user_id'] = Auth::user()->user_id;        

        $this->article->create($input);

        return Redirect::to($this->article_index_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $category_id
     * @param   int $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $category_id, $user_id)
    {
        $user = User::find($user_id);

        $article = $user->articles()
            ->where('visible', 'Y')
            ->where('admin_function_type_id', $this->blog->admin_function_type_id)
            ->orderBy('sort', 'desc')
            ->findOrFail($id);

        $selected_category = Category::findOrFail($category_id);
        $categories = $this->categories;
        $article_amount = $this->article_amount;

        return view('frontend.article.detail', compact(
            'article',
            'categories',
            'selected_category',
            'user',
            'article_amount'));
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

        $input['user_id'] = Auth::user()->user_id;
        $this->article->where('article_id', $id)->update($input);

        return Redirect::to($this->article_index_url);
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

        return Redirect::to($this->article_index_url);
    }

    public function deleteMultipleItems(Request $request)
    {
        $this->article->destroy($request->checkboxes);

        return Redirect::to($this->article_index_url);
    }

    public function itemList(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $rowsToSkip = ($request->input('rowsToSkip')) ? $request->input('rowsToSkip') : 0;
        $rowsToRetrive = ($request->input('rowsToRetrive')) ? $request->input('rowsToRetrive') : 10;

        $conditions = array(
                            'version_cht'            => 'Y',
                            'admin_function_type_id' => $this->blog->admin_function_type_id
                        );

        // \Debugbar::info($request->input('category_id'));
        
        if($request->input('category_id') && $request->input('category_id') != 'all'){
            $conditions['category_id'] = $request->input('category_id');
        }

        $articles = $user->articles()
            ->where($conditions)
            ->orderBy('article_id')
            ->skip($rowsToSkip)
            ->take($rowsToRetrive)
            ->get();


        $categories     = $user->categories()->orderBy('name')->get();
        $article_amount['total'] = 0;
        $category_arg   = $categories->toArray();


        foreach( $categories as $key => $category){
            $category_arg[$key]['total'] = $category->articles()->count();
            $article_amount['total'] += $category_arg[$key]['total'];
        }

        $category_arg       = array('categories'     => $category_arg);
        $user_arg           = array('user'           => $user);
        $article_amount_arg = array('article_amount' => $article_amount);
        $categories_return  = array_merge($category_arg, $user_arg, $article_amount_arg);

        if($request->input('isNavBar')) return response()->json($categories_return);

        if($request->input('isBlogContent')) return response()->json($articles);

    }

    public function itemListWithCategory($user_id, $id, Request $request)
    {
        $user = User::find($user_id);

        $articles = $user->articles()->where('visible', 'Y')
            ->where('version_cht', 'Y')
            ->where('category_id', $id)
            ->orderBy('sort', 'desc')
            ->get();

    
            if($request->ajax()){
                Log::info($articles);
                return response()->json($articles);
            }

        $selected_category = Category::findOrFail($id);
        $categories =  $user->categories()->orderBy('name')->get();
        $article_amount = $this->article_amount;

        return view('frontend.article.list', compact('articles', 'selected_category', 'categories', 'user', 'article_amount'));
    }
}

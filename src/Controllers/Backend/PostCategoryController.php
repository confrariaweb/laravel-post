<?php

namespace ConfrariaWeb\Post\Controllers\Backend;

use ConfrariaWeb\Post\Requests\StoreCategoryPostRequest;
use ConfrariaWeb\Post\Requests\UpdateCategoryPostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class PostCategoryController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables()
    {
        $categories = resolve('PostCategoryService')->all();
        return DataTables::of($categories)
            ->addColumn('sections', function ($category) {
                return $category->sections ? $category->sections->count() : NULL;
            })
            ->addColumn('posts', function ($category) {
                return $category->posts ? $category->posts->count() : NULL;
            })
            ->addColumn('user', function ($category) {
                return $category->user ? $category->user->name : NULL;
            })
            ->editColumn('status', function ($category) {
                return $category->status ? __('activated') : __('disabled');
            })
            ->addColumn('action', function ($category) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                    <a href="' . route('dashboard.posts.categories.show', $category->id) . '" class="btn btn-info">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="' . route('dashboard.posts.categories.edit', $category->id) . '" class="btn btn-primary">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" 
                        href="' . route('dashboard.posts.categories.destroy', $category->id) . '" 
                        onclick="event.preventDefault();
                        document.getElementById(\'categories-destroy-form-' . $category->id . '\').submit();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
                <form id="categories-destroy-form-' . $category->id . '" action="' . route('dashboard.posts.categories.destroy', $category->id) . '" method="category" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="' . csrf_token() . '">
                    <input type="hidden" name="id" value="' . $category->id . '">
                </form>';
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function index()
    {
        $this->data['categories'] = resolve('PostCategoryService')->all();
        return view(cwView('post_categories.index', true), $this->data);
    }

    public function create()
    {
        return view(cwView('post_categories.create', true), $this->data);
    }

    public function store(StoreCategoryPostRequest $request)
    {
        $data = $request->all();
        $category = resolve('PostCategoryService')->create($data);
        return redirect()
            ->route('dashboard.posts.categories.edit', $category->id)
            ->with('status', 'Categoria criado com sucesso!');
    }

    public function show($id)
    {
        $this->data['category'] = resolve('PostCategoryService')->find($id);
        return view(cwView('post_categories.show', true), $this->data);
    }

    public function edit($id)
    {
        $this->data['category'] = resolve('PostCategoryService')->find($id);
        return view(cwView('post_categories.edit', true), $this->data);
    }

    public function update(UpdateCategoryPostRequest $request, $id)
    {
        $category = resolve('PostCategoryService')->update($request->all(), $id);
        return redirect()
            ->route('dashboard.posts.categories.edit', $id)
            ->with('status', 'Categoria editado com sucesso!');
    }


    public function destroy($id)
    {
        $category = resolve('PostCategoryService')->destroy($id);
        return redirect()
            ->route('dashboard.posts.categories.index')
            ->with('status', 'Categoria deletada com sucesso!');
    }
}

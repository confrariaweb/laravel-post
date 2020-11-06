<?php

namespace ConfrariaWeb\Post\Controllers;

use ConfrariaWeb\Post\Requests\StorePostRequest;
use ConfrariaWeb\Post\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables(Request $request)
    {
        $posts = resolve('PostService')->all();
        return DataTables::of($posts)
            ->addColumn('image', function ($post) {
                return isset($post->options['image']['file'])? '<img src="' . asset('storage/' . $post->options['image']['file']) . '" class="img img-fluid" style="width:80px">' : '';
            })
            ->addColumn('section', function ($post) {
                return $post->sections->implode('name', ', ');
            })
            ->addColumn('category', function ($post) {
                return $post->categories->implode('name', ', ');
            })
            ->editColumn('status', function ($post) {
                return $post->domains ? __('activated') : __('disabled');
            })
            ->addColumn('action', function ($post) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                    <a href="' . route('dashboard.posts.show', $post->id) . '" title="Ver" class="btn btn-info">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="' . route('dashboard.posts.edit', $post->id) . '" title="Editar" class="btn btn-primary">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger"                     
                        href="' . route('dashboard.posts.destroy', $post->id) . '" 
                        title="Deletar"
                        onclick="event.preventDefault();
                        document.getElementById(\'posts-destroy-form-' . $post->id . '\').submit();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
                <form id="posts-destroy-form-' . $post->id . '" action="' . route('dashboard.posts.destroy', $post->id) . '" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="' . csrf_token() . '">
                    <input type="hidden" name="id" value="' . $post->id . '">
                </form>';
            })
            ->rawColumns(['image', 'action'])
            ->make();
    }

    public function index(Request $request)
    {
        $this->data['section'] = resolve('PostSectionService')->findBy('slug', $request->section);
        return view(cwView('posts.index', true), $this->data);
    }

    public function create(Request $request)
    {
        $this->data['files'] = Config::get('cw_post.form.files');
        $this->data['options'] = Config::get('cw_post.form.options');
        $this->data['sections'] = resolve('PostSectionService')->pluck();
        $this->data['categories'] = resolve('PostCategoryService')->pluck();
        return view(cwView('posts.create', true), $this->data);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $post = resolve('PostService')->create($data);
        return redirect()
            ->route('dashboard.posts.edit', ['post' => $post->id, 'section' => $data['section']])
            ->with('status', 'Postagem criado com sucesso!');
    }

    public function show($id)
    {
        $this->data['post'] = resolve('PostService')->find($id);
        return view(cwView('posts.show', true), $this->data);
    }

    public function edit($id)
    {
        $this->data['files'] = Config::get('cw_post.form.files');
        $this->data['options'] = Config::get('cw_post.form.options');
        $this->data['sections'] = resolve('PostSectionService')->pluck();
        $this->data['categories'] = resolve('PostCategoryService')->pluck();
        $this->data['post'] = resolve('PostService')->find($id);
        return view(cwView('posts.edit', true), $this->data);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->all();
        $post = resolve('PostService')->update($data, $id);
        return redirect()
            ->route('dashboard.posts.edit', ['post' => $post->id, 'section' => $data['section']])
            ->with('status', 'Post editado com sucesso!');
    }


    public function destroy($id)
    {
        $post = resolve('PostService')->destroy($id);
        return redirect()
            ->route('dashboard.posts.index')
            ->with('status', 'Postagem deletada com sucesso!');
    }
}

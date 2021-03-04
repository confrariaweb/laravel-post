<?php

namespace ConfrariaWeb\Post\Controllers\Backend;

use ConfrariaWeb\Post\Requests\StoreSectionPostRequest;
use ConfrariaWeb\Post\Requests\UpdateSectionPostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class PostSectionController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables()
    {
        $sections = resolve('PostSectionService')->all();
        return DataTables::of($sections)
            ->addColumn('categories', function ($section) {
                return $section->categories ? $section->categories->count() : NULL;
            })
            ->addColumn('posts', function ($section) {
                return $section->posts ? $section->posts->count() : NULL;
            })
            ->addColumn('user', function ($section) {
                return $section->user ? $section->user->name : NULL;
            })
            ->editColumn('status', function ($section) {
                return $section->status ? __('activated') : __('disabled');
            })
            ->addColumn('action', function ($section) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                    <a href="' . route('dashboard.posts.sections.show', $section->id) . '" class="btn btn-info">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="' . route('dashboard.posts.sections.edit', $section->id) . '" class="btn btn-primary">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" 
                        href="' . route('dashboard.posts.sections.destroy', $section->id) . '" 
                        onclick="event.preventDefault();
                        document.getElementById(\'sections-destroy-form-' . $section->id . '\').submit();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </div>
                <form id="sections-destroy-form-' . $section->id . '" action="' . route('dashboard.posts.sections.destroy', $section->id) . '" method="section" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="' . csrf_token() . '">
                    <input type="hidden" name="id" value="' . $section->id . '">
                </form>';
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function index()
    {
        $this->data['sections'] = resolve('PostSectionService')->all();
        return view(cwView('post_sections.index', true), $this->data);
    }

    public function create()
    {
        return view(cwView('post_sections.create', true), $this->data);
    }

    public function store(StoreSectionPostRequest $request)
    {
        $data = $request->all();
        $section = resolve('PostSectionService')->create($data);
        return redirect()
            ->route('dashboard.posts.sections.edit', $section->id)
            ->with('status', 'Seção criado com sucesso!');
    }

    public function show($id)
    {
        $this->data['section'] = resolve('PostSectionService')->find($id);
        return view(cwView('post_sections.show', true), $this->data);
    }

    public function edit($id)
    {
        $this->data['section'] = resolve('PostSectionService')->find($id);
        return view(cwView('post_sections.edit', true), $this->data);
    }

    public function update(UpdateSectionPostRequest $request, $id)
    {
        $section = resolve('PostSectionService')->update($request->all(), $id);
        return redirect()
            ->route('dashboard.posts.sections.edit', $id)
            ->with('status', 'Seção editado com sucesso!');
    }


    public function destroy($id)
    {
        $section = resolve('PostSectionService')->destroy($id);
        return redirect()
            ->route('dashboard.posts.sections.index')
            ->with('status', 'Seção deletada com sucesso!');
    }
}

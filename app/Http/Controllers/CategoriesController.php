<?php

namespace codeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use codeDelivery\Models\Category;
use codeDelivery\Http\Requests\AdminCategoryRequest;
use Illuminate\View\Middleware\ErrorBinder;


class CategoriesController extends Controller
{
	private $repository;

	public function __construct(Category $c)
	{
		$this->repository = $c;
	}

    public function index()
    {
    	//$categories = $c->all();
    	$categories = $this->repository->paginate(10);
    	
    	return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');	
    }

	public function store(AdminCategoryRequest $request)
    {
    	$data = $request->all();
    	$this->repository->create($data);    	

    	return redirect()->route('admin.categories.index');
}

    /*1° vai para edit, depois vai para update*/
	public function edit($id)
	{
		$category = $this->repository->find($id);

		return view('admin.categories.edit', compact('category'));
	}

	public function update(AdminCategoryRequest $request, $id)
	{
		$data = $request->all();
    	$up = $this->repository::find($id);
    	$up->update($data);    	

    	return redirect()->route('admin.categories.index');
	}
}

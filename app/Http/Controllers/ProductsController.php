<?php

namespace codeDelivery\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use codeDelivery\Models\Product;
use codeDelivery\Models\Category;
use codeDelivery\Http\Requests\AdminProductRequest;
use Illuminate\View\Middleware\ErrorBinder;


class ProductsController extends Controller
{
	private $repository;
	private $categoryRepository;

	public function __construct(Product $p, Category $c)
	{
		$this->repository = $p;
		$this->categoryRepository =  $c;
	}

    public function index()
    {    	
    	$products = $this->repository->paginate(20);
    	$filename = 'a.jpeg';
    	return view('admin.products.index', compact('products', 'filename'));    	
    	//<img src="/admin/product/{{ $product['image'] }}" height="30px" width="30px" />
    }

    public function create()
    {
    	$categories = $this->categoryRepository->lists();
    	return view('admin.products.create', compact('categories'));	
    }

	public function store(AdminProductRequest $request)
    {
    	$data = $request->all();
    	$this->repository->create($data);    	

    	return redirect()->route('admin.products.index');
    }

    /*1° vai para edit, depois vai para update*/
	public function edit($id)
	{
		$product = $this->repository->find($id);
		$categories = $this->categoryRepository->lists();
		return view('admin.products.edit', compact('product', 'categories'));
	}

	public function update(AdminProductRequest $request, $id)
	{
		$data = $request->all();
    	$up = $this->repository::find($id);
    	$up->update($data);    	

    	return redirect()->route('admin.products.index');
	}

	public function destroy($id)
	{
		$aux = $this->repository->find($id);
		$aux->delete();
		return redirect()->route('admin.products.index');
	}
	
	public function search($name)
	{
	  // Gets the query string from our form submission 
	  //$query = Request::input('search');
	  // Returns an array of articles that have the query string located somewhere within 
	  // our articles titles. Paginates them so we can break up lots of search results.
	  //$articles = $this->repository::where('name', 'LIKE', '%'.$query.'%')->paginate(10);	      
		$articles = $this->repository::where('name', 'LIKE', '%'.$name.'%')->paginate(10);	      
	  // returns a view and passes the view the list of articles and the original query.
	  return view('admin.products.index', compact('products'));
	}
}

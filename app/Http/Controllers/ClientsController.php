<?php

namespace codeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use codeDelivery\Models\Client;
use codeDelivery\Models\User;
use codeDelivery\Services\ClientSService;
use codeDelivery\Http\Requests\AdminClientRequest;
use Illuminate\View\Middleware\ErrorBinder;


class ClientsController extends Controller
{
	private $repository;
    private $clientService;
	public function __construct(Client $c, ClientSService $cS)
    //public function __construct(Client $c)
	{
		$this->repository = $c;
        $this->clientService = $cS;
        //$this->clientService = new ClientService($client, $user);
	}

    public function index()
    {
    	//$categories = $c->all();
    	$clients = $this->repository->paginate(10);
    	
    	return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
    	return view('admin.clients.create');	
    }

	public function store(AdminClientRequest $request)
    {
    	$data = $request->all();
    	//$this->repository->create($data);    	
        $this->clientService->store($data);
    	return redirect()->route('admin.clients.index');
}

    //1° vai para edit, depois vai para update
	public function edit($id)
	{
		$client = $this->repository->find($id);

		return view('admin.clients.edit', compact('client'));
	}

    
	public function update(AdminClientRequest $request, $id)
	{
		//$data = $request->all();
    	//$up = $this->repository::find($id);    
    	//$up->update($data);        
        //$this->clientService->update($data, $id);
        $this->clientService->uupdate($request, $id);
    	return redirect()->route('admin.clients.index');
	}
    
}

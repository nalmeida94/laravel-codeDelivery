<?php 

namespace codeDelivery\Services;

use codeDelivery\Models\Client;
use codeDelivery\Models\User;
use codeDelivery\Http\Requests\AdminClientRequest;

class ClientSService{
	private $client;
	private $user;

	public function __construct(Client $client, User $user)
	{
		$this->client = $client;
		$this->user = $user;
	}

	//public function uupdate($id)
	public function uupdate(AdminClientRequest $request, $id)
	{	
		$data = $request->all();
		$c = $this->client->find($id);
		//dd($data);
		$c->update([
		'phone'=>$data['phone'],
		'address'=>$data['address'],
		'status'=>$data['state'],
		'zipcode'=>$data['zipcode']]);
		$userId = $this->client->where('user_id', $id);
		
		//$up = $this->user->find($userId->['user_id'],['user']);
		$up = $this->user->where('user', $userId);
    	//$up->update([$data['user']]);
    	$up->update([
    		'name'=>$data['user']['name'],
    		'email'=>$data['user']['email']]);
	}
}
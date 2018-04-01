<?php 

namespace codeDelivery\Services;

use codeDelivery\Models\Client;
use codeDelivery\Models\User;
use codeDelivery\Http\Requests\AdminClientRequest;

class ClientService{
	private $client;
	private $user;

	public function __construct(Client $client, User $user)
	{
		$this->client = $client;
		$this->user = $user;
	}

	public function update(AdminClientRequest $request, $id)
	{	
		$data = $request->all();
		//dd($data);  		
		$c = $this->client->find($id);
		$c->update(//$data['user']=>'user',
		$data['phone']=>'phone',
		$data['address']=>'address',
		$data['state']=>'status',
		$data['zipcode']=>'zipcode');
		//$userId = $this->client->find($id, ['user_id'])->user_id;
		$userId = $this->client->findByField('user_id', $id)->user_id;
		//$userId = $this->client->where('user_id', $id)->user_id;
		
		//$this->user->update($data['user_id'], $userId);
		
		$up = $this->user->find($userId,['user']);
    	$up->update($data);
	}

	public function store(array $data)
	{		
		$data['user']['password'] = bcrypt(123456);

		$this->user->create($data['user']);    	
		$userId = $this->client->where(['user_id'], $id)->user_id;
		$data['user_id'] = $userId;
		$this->user->create($data);
	}
}
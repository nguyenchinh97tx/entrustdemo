<?php

namespace Core\Repositories;

interface UserRepositoryContract
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $request);
    public function destroy($id);
    public function editUser($id);
    public function listRole();


}
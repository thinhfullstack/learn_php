<?php

class UserController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User;
    }

    public function index()
    {
        view('users.index', [
            'title' => 'List Users',
            'users' => $this->model->getAll(),
        ]);
    }

    public function create()
    {
        view('users.create', [
            'title' => 'Create User',
        ]);
    }

    public function store()
    {

    }

    public function edit()
    {
        
    }

    public function show()
    {
        
    }

    public function update()
    {

    }

    public function delete($id)
    {
        $this->model->delete($id);
    }
}
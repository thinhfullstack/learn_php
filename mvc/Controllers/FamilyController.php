<?php

class FamilyController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Family;
    }

    public function index()
    {
        view('families.index', [
            'title' => 'Family Infomation',
            'families' => $this->model->getAll()
        ]);
    }

    public function create()
    {
        view('families.form', [
            'title' => 'Family Create',
            'actionUrl' => 'index.php?controller=family&action=store'
        ]);
    }

    public function store()
    {
        $inputs = $_POST;
        $errMessage = $this->validate();

        if(empty($errMessage)) {
            $this->model->create([
                'name' => $inputs['name'],
                'address' => $inputs['address'],
                'phone' => $inputs['phone'],
            ]);

            return redirect('index.php?controller=family');
        }

        view('families.form', [
            'errMessage' => $errMessage
        ]);
    }

    public function edit()
    {
        $family = $this->model->findById($_GET['id'] ?? 0);

        if(!$family) {
            echo 'Family not found';
            return;
        }

        view('families.form', [
            'title' => 'Family Edit',
            'family' => $family,
            'actionUrl' => 'index.php?controller=family&action=update&id=' . $family->id
        ]);
    }

    public function update()
    {
        $inputs = $_POST;
        $familyId = $_GET['id'] ?? 0;

        $family = $this->model->findById($_GET['id'] ?? 0);

        if(!$family) {
            echo 'Family not found';
            return;
        }

        $errMessage = $this->validate();

        if(empty($errMessage)) {
            $this->model->update([
                'name' => $inputs['name'],
                'address' => $inputs['address'],
                'phone' => $inputs['phone'],
            ], $familyId);

            return redirect('index.php?controller=family');
        }

        view('families.form', [
            'title' => 'Family update',
            'family' => $family,
            'errMessage' => $errMessage,
        ]);
    }

    public function delete()
    {
        $this->model->deleteById($_GET['id'] ?? 0);
        return redirect('index.php?controller=family');
    }

    protected function validate()
    {
        $inputs = $_POST;
        $errMessage = []; // Validate the input

        if(empty($inputs['name'])) {
            $errMessage['name'] = 'Vui lòng nhập tên hộ gia đình';
        }

        if(empty($inputs['address'])) {
            $errMessage['address'] = 'Vui lòng nhập địa chỉ hộ gia đình';
        }

        if(empty($inputs['phone'])) {
            $errMessage['phone'] = 'Vui lòng nhập số điện thoại hộ gia đình';
        }

        return $errMessage;
    }
}
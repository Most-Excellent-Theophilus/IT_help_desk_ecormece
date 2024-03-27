<?php

class Users
{

    public static function index()
    {
        $model = new Users_model;
        return   $model->getAll();
    }
    public static function count()
    {
        $model = new Users_model;
        return $model->countAll();

    }

    public static function store($data)
    {
        $model = new Users_model;
        return $model->create($data);
    }


    public static function show($id)
    {
        $model = new Users_model;
        return   $model->read($id);
    }


    public static function update($id, $data)
    {
        $model = new Users_model;
        return $model->update($id, $data);
    }


    public static function destroy($id)
    {
        $model = new Users_model;
        return  $model->delete($id);
    }
    public static function search($data)
    {
        $model = new Users_model;
        return $model->find($data);
    }
}

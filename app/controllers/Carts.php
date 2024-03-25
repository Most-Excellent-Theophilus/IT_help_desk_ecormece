<?php
class Carts 
{
     
    public static function index()
    {
        $model = new Carts_model;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new Carts_model;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new Carts_model;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new Carts_model;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new Carts_model;
        $model->delete($id);

    }
    public static function search($data)
    {
        $model = new Carts_model;
        $model->find($data);
    }   
}

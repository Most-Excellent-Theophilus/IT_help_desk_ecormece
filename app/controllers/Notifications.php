<?php

class Notifications 
{
        
    public static function index()
    {
        $model = new Notifications_model ;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new Notifications_model ;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new Notifications_model ;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new Notifications_model ;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new Notifications_model ;
        $model->delete($id);

    }
    public static function search($data)
    {
        $model = new Notifications_model ;
        $model->find($data);
    }
}

<?php 

class Users 
{
      
    public static function index()
    {
        $model = new Users_model ;
        $model->getAll();

    }


    public static function store($data)
    {
        $model = new Users_model ;
        $model->create($data);

    }


    public static function show($id)
    {
        $model = new Users_model ;
        $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new Users_model ;
        $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new Users_model ;
        $model->delete($id);

    }
    public static function search()
    {
        $model = new Users_model ;
    }  
}

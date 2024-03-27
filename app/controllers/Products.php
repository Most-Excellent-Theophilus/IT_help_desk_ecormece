<?php

class Products
{

    public static function index()
    {
        $model = new Products_model;
        return $model->getAll();
    }
    public static function count()
    {
        $model = new Products_model;
        return $model->countAll();

    }

    public static function store($data)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];

            $upload_dir = 'statics/media/photos/';

            $new_file_name = uniqid('image_') . '_' . time() . '.jpg';
            $data['uniqueId'] =  $new_file_name;

            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {

                $model = new Products_model;
                return $model->create($data);
            } else {
                return  ['status' => 'fail', 'message' => 'Error uploading file'];
            }
        } else {
            return  ['status' => 'error', 'message' => 'No file uploaded or an error occurred.'];
        }



    }


    public static function show($id)
    {
        $model = new Products_model;
        return $model->read($id);
    }


    public static function update($id, $data)
    {
        $model = new Products_model;
        return $model->update($id, $data);
    }


    public static function destroy($id)
    {
        $model = new Products_model;
        return $model->delete($id);
    }
    public static function search($data)
    {
        $model = new Products_model;
        return $model->find($data);
    }
}

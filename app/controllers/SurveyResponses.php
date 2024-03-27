<?php

class surveyResponses 
{
    
    public static function index()
    {
        $model = new SurveyResponses_model;
        return $model->getAll();

    }
    public static function count()
    {
        $model = new SurveyResponses_model;
        return $model->countAll();

    }

    public static function store($data)
    {
        $model = new SurveyResponses_model;
        return $model->create($data);

    }


    public static function show($id)
    {
        $model = new SurveyResponses_model;
        return $model->read($id);


    }


    public static function update($id,$data)
    {
        $model = new SurveyResponses_model;
        return $model->update($id,$data);

    }


    public static function destroy($id)
    {
        $model = new SurveyResponses_model;
        return $model->delete($id);

    }
    public static function search($data)
    {
        $model = new SurveyResponses_model;
        return $model->find($data);

    }
}

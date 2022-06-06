<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class PayloadHelper
{
    public static function modified(Model $model, array $payload) : array
    {
        $attributes = [];
        foreach ($model->getFillable() as $key)
        {
            if (isset($payload[$key]) && $payload[$key] !== $model[$key])
            {
                $attributes[$key] = $payload[$key];
            }
        }
        return $attributes;
    }

    public static function validFields(string $className, array $fields) : array
    {
        $validFields = [];
        $fieldNames = $className::getFieldNames();
        foreach ($fields as $field)
        {
            if (in_array($field, $fieldNames)) array_push($validFields, $field);
        }
        return $validFields;
    }
}

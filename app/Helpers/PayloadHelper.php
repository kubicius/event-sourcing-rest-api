<?php

namespace App\Helpers;

use App\Models\IModel;
use Illuminate\Database\Eloquent\Model;

class PayloadHelper
{
    /**
     *
     * Returns the array of values that are different than in the passed object but only for allowed keys.
     *
     * @param Model $object
     * @param array $payload
     * @return array
     */
    public static function modified(Model $object, array $payload) : array
    {
        $attributes = [];
        foreach ($object->getFillable() as $key)
        {
            if (isset($payload[$key]) && $payload[$key] !== $object[$key])
            {
                $attributes[$key] = $payload[$key];
            }
        }
        return $attributes;
    }

    /**
     *
     * Returns these of field names that are valid for passed object.
     *
     * @param IModel $object
     * @param array $fields
     * @return array
     */
    public static function validFieldNames(IModel $object, array $fields) : array
    {
        $validFields = [];
        $fieldNames = $object::getFieldNames();
        foreach ($fields as $field)
        {
            if (in_array($field, $fieldNames)) array_push($validFields, $field);
        }
        return $validFields;
    }
}

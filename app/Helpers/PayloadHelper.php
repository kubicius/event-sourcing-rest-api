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
}

<?php
namespace App\Traits;
use Ramsey\Uuid\Uuid;

trait GenerateUuid
{
    public static function bootUuid()
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
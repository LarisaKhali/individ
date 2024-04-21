<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'build_id',
        'name',
        'number',
        'type_id',
        'area',
        'number_of_seats',
    ];


    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    public function getId(): int
    {
        return $this->id;
    }

}
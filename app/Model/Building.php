<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Building extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
    ];

    protected $primaryKey = 'build_id';

    public function findIdentity(int $build_id)
    {
        return self::where('build_id', $build_id)->first();
    }

    public function getId(): int
    {
        return $this->build_id;
    }

}
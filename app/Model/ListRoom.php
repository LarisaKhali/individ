<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class ListRoom extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'build_id',
        'room_id',
    ];

    protected $table = 'list_rooms';


    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    public function getId(): int
    {
        return $this->id;
    }

}
<?php

namespace App\Models;

use App\Http\Controllers\LabelController;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\ToDoList;

class User extends Authenticatable
{
    protected $table = 'user';

    protected $primaryKey = 'id_user';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public function todolists()
    {
        return $this->hasMany(ToDoList::class, 'id_user', 'id_user');
    }

    public function profile()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }

    public function labels()
    {
        return $this->hasMany(Label::class, 'id_user');
    }

}


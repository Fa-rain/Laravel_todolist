<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $table = 'todolist';

    protected $primaryKey = 'id_todolist';

    protected $guarded = ['id_todolist'];
}

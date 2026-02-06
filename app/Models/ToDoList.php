<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ToDoList extends Model
{
    protected $table = 'todolist';

    protected $primaryKey = 'id_todolist';

    protected $guarded = ['id_todolist'];

        /**
     * Relasi ToDoList dimiliki oleh satu User
     */
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}



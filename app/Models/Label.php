<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'label';

    protected $primaryKey = 'id_label';

    protected $fillable = ['label_name', 'id_user'];

    protected $guarded = ['id_label'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function todolists()
    {
        return $this->belongsToMany(Todolist::class, 'label_todolist');
    }

}

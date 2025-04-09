<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Todo extends Model
{
    use  HasApiTokens;
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'user_id'
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }
}

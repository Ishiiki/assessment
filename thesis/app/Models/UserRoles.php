<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'user_id','roles_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function roles(){
        return $this->belongsTo(Roles::class, 'roles_id');
    }

}

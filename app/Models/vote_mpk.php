<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class vote_mpk extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

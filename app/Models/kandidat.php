<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class kandidat extends Model
{
    protected $table = 'kandidats';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoris()
    {
        return $this->belongsTo(categoris::class);
    }
}

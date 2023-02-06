<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function accounts(){
        return $this->hasMany(Account::class, 'account_id', 'account_id');
    }
}

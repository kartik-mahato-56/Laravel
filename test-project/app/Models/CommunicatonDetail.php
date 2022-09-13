<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicatonDetail extends Model
{
    use HasFactory;
    
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'user_id');
    }

}

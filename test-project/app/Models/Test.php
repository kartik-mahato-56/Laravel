<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
}
class Enquiry extends Model{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'enquiry_message'
    ];
}

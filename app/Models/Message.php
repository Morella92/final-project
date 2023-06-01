<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'teacher',
        'text',
        'ui_name',
        'ui_email',
        'ui_phone',
        'date_fake'
    ];
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
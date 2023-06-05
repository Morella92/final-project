<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->created_at)) {
                $startDate = Carbon::create(2020, 1, 1);
                $endDate = Carbon::create(2023, 6, 5);
                $currentDate = Carbon::now();

                if ($currentDate->greaterThanOrEqualTo(Carbon::create(2023, 6, 6))) {
                    $model->created_at = $currentDate;
                } else {
                    $randomDate = Carbon::createFromTimestamp(mt_rand($startDate->timestamp, $endDate->timestamp));
                    $model->created_at = $randomDate;
                }
            }
        });
    
    }






    protected $fillable = [
        'text',
        'ui_name',
        'ui_email',
        'ui_phone',
        'title',
        'teacher_id'
    ];
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
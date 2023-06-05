<?php

namespace App\Models;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

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
        'userReview',
        'review',
        'teacher_id'
    ];

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }
}
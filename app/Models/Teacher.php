<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = [
        'specializations',
        'user',
    ];

    protected $fillable = [
        'performance',
        'cv',
        'picture',
        'phone',
        'credit_card',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function specializations(){
        return $this->belongsToMany(Specialization::class);
    }

    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }

    public function votes(){
        return $this->belongsToMany(Vote::class);
    }

    public function message(){
        return $this->belongsTo(Message::class);
    }

    public function review(){
        return $this->belongsTo(Review::class);
    }

    public function getSpecializationIds()
    {
        return $this->specializations->pluck('id')->all();
    }

    protected function cvPath(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return asset('storage/' . $attributes['cv']);
            }
        );
    }

    protected function picturePath(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return asset('storage/' . $attributes['picture']);
            }
        );
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['cv_path', 'picture_path'];

}
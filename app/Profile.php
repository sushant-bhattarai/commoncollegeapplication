<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['interest'];

    public function setInterestAttribute($value)
    {
        $this->attributes['interest'] = json_encode($value);
    }

    public function getInterestAttribute($value)
    {
        return $this->attributes['interest'] = json_decode($value);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'user_id'];



    public function user()
    {
        return $this->belongsTo('App\User')->select(['id', 'name', 'color']);
    }

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('c');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table = 'event_registrations';
    public $primarykey = 'registration_id';
    protected $fillable = [
        'event_id',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

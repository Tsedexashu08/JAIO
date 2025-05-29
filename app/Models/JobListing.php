<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $table = 'job_listings';
    protected $primaryKey='job_id';
    protected $fillable = [
        'title',
        'type',
        'company_name',
        'logo',
        'location',
        'description',
        'category',
        'application_deadline',
        'apllication_link',
    ];
    public function applications()
    {
        return $this->hasMany(appliedcareers::class, 'job_id', 'job_id');
    }
}

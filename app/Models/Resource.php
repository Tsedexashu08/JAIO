<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    protected $primaryKey = 'resource_id';
    protected $fillable = ['title', 'description', 'file_path'];
}

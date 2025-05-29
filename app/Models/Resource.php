<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';

    protected $fillable = [
        'title',       // Add this
        'description', // Include other fields that should be mass-assignable
        'link',
        'file_path',
        'linkorfile'   // Or whatever your field names are
    ];
}

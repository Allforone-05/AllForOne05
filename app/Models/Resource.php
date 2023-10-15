<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // En app/Models/Resource.php
public function module()
{
    return $this->belongsTo(Module::class, 'module_id');
}

}

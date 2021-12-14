<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site;

class Template extends Model
{
    use HasFactory;

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}

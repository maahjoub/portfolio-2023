<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function imageable()
    {
        return $this->morphTo();
    }

}

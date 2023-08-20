<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skills extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function project(): HasMany
    {
        return $this->morphMany(Project::class, 'skill_id');
    }
}

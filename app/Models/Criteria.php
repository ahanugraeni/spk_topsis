<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';

    protected $fillable = ['name', 'weight', 'categories'];

    public function values()
    {
        return $this->hasMany(AlternativeValue::class);
    }
}

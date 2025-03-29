<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $guarded = 'id';
    protected $fillable = ['name', 'photo', 'description'];

    public function elections()
    {
        return $this->hasMany(Election::class);
    }
}

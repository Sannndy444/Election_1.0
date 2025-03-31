<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $guarded = 'id';
    protected $fillable = ['name', 'photo', 'description'];

    public function electionOne()
    {
        return $this->hasMany(Election::class, 'candidate_1_id');
    }

    public function electionTwo()
    {
        return $this->hasMany(Election::class, 'candidate_2_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elections';

    protected $guarded = 'id';
    protected $fillable = ['photo_election', 'candidate_1_id', 'candidate_2_id', 'title', 'description', 'start_date', 'end_date', 'status'];

    public function candidatesOne()
    {
        return $this->belongsTo(Candidate::class, 'candidate_1_id');
    }

    public function candidatesTwo()
    {
        return $this->belongsTo(Candidate::class, 'candidate_2_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elections';

    protected $guarded = 'id';
    protected $fillable = ['candidate_id', 'title', 'description', 'start_date', 'end_date', 'status'];

    public function candidates()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}

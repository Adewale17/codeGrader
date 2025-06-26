<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeSubmission extends Model
{
    protected $fillable = ['language', 'user_id', 'code', 'ai_feedback'];


    // Optionally, you can define relationships or additional methods here
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeSubmission extends Model
{
    protected $fillable = ['language', 'code', 'ai_feedback'];

    // Optionally, you can define relationships or additional methods here
}

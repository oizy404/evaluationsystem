<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = ['evaluation_id', 'tool_id', 'item_id', 'score', 'student_id' ];

    public function evaluation(){
        return $this->belongsTo('App\Models\Evaluation');
    }

    public function item(){
        return $this->belongsTo('App\Models\ToolItem','item_id');
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}

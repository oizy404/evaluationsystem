<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $table= 'total_scores';

    public function evaluation(){
        return $this->belongsTo("App\Evaluation", "evaluation_id");
    }
    public function item(){
        return $this->belongsTo("App\ToolItem", "item_id");
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}

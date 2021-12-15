<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolItem extends Model
{
    protected $table= 'tool_items';

    public function tool(){
        return $this->belongsTo("App\Models\Tool", "tool_id");
    }

    public function totalscores(){
        return $this->hasMany("App\Models\Total");
    }
    
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }


}

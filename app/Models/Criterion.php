<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $table = "criteria";
    protected $fillable = ["tool_id", "item_id", "criterion", "points"];

    public function item(){
        return $this->belongsTo("App\Models\ToolItem");
    }
  

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }






}

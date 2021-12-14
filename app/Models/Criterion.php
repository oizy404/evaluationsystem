<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $table = "criteria";
    protected $fillable = ["criterion", "points"];

    public function item(){
        return $this->belongsTo("App\Models\ToolItem", "tool_item_id");
    }
    public function tool(){
        return $this->belongsTo("App\Models\Tool", "tool_id");
    }
  

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }






}

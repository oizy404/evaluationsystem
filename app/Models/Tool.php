<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ToolItem;

class Tool extends Model
{
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

 //  public function $evaluation

    public function items(){
        return $this->hasMany("App\Models\ToolItem");
    }
    public function criterion(){
        return $this->hasMany("App\Models\Criterion");
    }
    
    public function categories(){
        return $this->hasMany("App\Models\Category");
    }

}

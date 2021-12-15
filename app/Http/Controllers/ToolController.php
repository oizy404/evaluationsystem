<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\ToolItem;
use App\Models\Criterion;

class ToolController extends Controller
{
    public function getTools(){
        $tools = Tool::all();
        return view('admin.tools')->with("tools", $tools);
    }

    public function getItems($id){
        $tool =  Tool::find($id);
        $items = $tool->items;
        if($tool->id== 5){
            return view('admin.ntptoolItems')->with([
                'items' => $items,
                'id' => $id,
                'header' => $tool->toolname
                ]);
        }
        return view('admin.toolItems')->with([
            'items' => $items,
            'id' => $id,
            'header' => $tool->toolname
            ]);           
    }

    public function storeItem(Request $request){

        if($request->toolId == 5){
            $i=1;
            foreach($request->statements as $statement){
                $item = new ToolItem;
                $item->tool_id = $request->toolId;
                $item->statement = $statement;
                $criterions="criterions".$i;
                echo($item->statement);
                $item->save();
                $points=1;
                foreach($request->$criterions as $criterion){
                    $criteria=new Criterion;
                    $criteria->tool_id=$request->toolId;
                    $criteria->tool_item_id=$item->id;
                    $criteria->criterion=$criterion;
                    $criteria->points=$points;
                    $criteria->save();
                    echo($criterion);
                    $points++;
                }
                $i++;
            }
        }
        if($request->toolId != 5){
            $item = new ToolItem;
            $item->statement = $request->statement;
            $item->tool_id = $request->toolId;
            $item->save();   
            
            $points=1;
            foreach($request->criterion as $criterionn){
                $criteria = Criterion::create([
                    'criterion' => $criterionn,
                    'points' => $points,
                ]);
                $criteria->tool_id=$request->toolId;
                $criteria->tool_item_id=$item->id;
                $criteria->save();
                $points++;
            };
            return redirect()->back();
        }
     
    }

    public function updateItem(Request $request, $id){
        //return $id;
        $item = ToolItem::find($id);
        $item->statement = $request->statement;
        $item->save();
        return redirect()->back();
    }

    public function deleteItem($id){
        $item = ToolItem::find($id);
        $item->delete();
        return redirect()->back();
    }
    

}

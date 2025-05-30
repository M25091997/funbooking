<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getdistricts(Request $request){
        $state_id = $request->state_id;
        $districts = Area::get()->where('type','District')->where('parent_id',$state_id);
        echo json_encode($districts);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlurGroup;
use App\AlurMaster;

class AssistantController extends Controller
{
    public function getAssistantResponse() {
        // $validator = Validator::make(request()->all(), []);

        $alurMaster = null;
        if(request('lastAssisted') > -1) {
            $alurMaster = AlurMaster::with('group')->whereId(request('lastAssisted'))->first();
        }else if(request('lastAssisted') === -1) {
            $alurMaster = AlurMaster::with('group')->first();
        } else {
            $alurGroup = AlurGroup::whereId(request('group'))->first();
            $alurMaster = $alurGroup->flows()->with('group')->first();
        }

        return response()->json(['lastAssisted' => request('lastAssisted'),'element' => AlurMaster::with('group')->first(),'valids' => (request('lastAssisted') === -1),'msg' => '', 'assist_results' => $alurMaster], 200);
    }

    public function getAssistantResponseViaGroup() {
        $alurMaster = [];
        if(request()->group_id > -1) {
            $alurGroup = AlurGroup::whereId(request()->group_id)->first();
            if($alurGroup) {
                $alurMaster = $alurGroup->alurMasters;
            }
        }

        return response()->json(['msg' => '', 'assist_results' => $alurMaster], 200);
    }

    public function storeUserInput() {
        return '';
    }
}
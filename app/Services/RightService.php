<?php

namespace App\Services;

use App\Models\Right;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RightService
{


    public function showRightForm()
    {
        return view('rights.searchRightsUser');
    }

    public function AddRight(Request $request)
    {
        //
    }

    public function showFormSearchRights()
    {
        return view('rights.right');
    }

    public function search(Request $request)
    {
        //
    }

    public function rightFinish($user, $right)
    {
        //
    }
}

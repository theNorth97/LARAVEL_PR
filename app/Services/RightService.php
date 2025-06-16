<?php

namespace App\Services;

use App\Models\Right;

use Illuminate\Support\Facades\Auth;

class RightService
{


    public function showRightForm()
    {
        return view('rights.searchRightsUser');
    }

    public function AddRight()
    {
        true;
        //принимаю массив данных 
    }

    public function showFormSearchRights()
    {
        return view('rights.right');
    }

    public function search()
    {
        true;
    }

    public function rightFinish($user, $right)
    {
        true;
    }
}

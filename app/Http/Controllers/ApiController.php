<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getList()
    {
        $list = [
            [
                "name" => "Francis",
                "content" => "I love React."
            ],
            [
                "name" => "Jacken",
                "content" => "I love Managementxx."
            ],
        ];

        return response()->json($list);
    }
}

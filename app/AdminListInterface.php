<?php
/**
 * Created by IntelliJ IDEA.
 * User: boonhong
 * Date: 1/20/16
 * Time: 2:13 PM
 */

namespace App;

use Illuminate\Http\Request;


interface AdminListInterface
{
    public function deleteMultipleItems(Request $request);
}
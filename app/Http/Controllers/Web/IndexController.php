<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2021/2/20
 * Time: 2:55 PM
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('web.index');
    }
}


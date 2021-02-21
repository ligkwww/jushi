<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    // 文件类型
    static $categories = [
        1 => '电影',
        2 => '电视剧',
        3 => '小说',
        4 => '音频',
        5 => '学习资料'
    ];

    // 网盘类型
    static $diskType = [
        1 => '百度网盘'
    ];
}

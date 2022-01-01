<?php

namespace App\Base\Helpers;

use App\Models\Category;
use App\Models\ChinaUniversity;

class Menu
{

    public static function getUniLinks()
    {
        $unis = ChinaUniversity::query()
            ->select(['name', 'slug'])
            ->whereIn('name', [
                'Tsinghua University',
                'Peking University',
                'Fudan University',
                'Zhejiang University',
                'Shanghai Jiao Tong University',
                'University of Science and Technology of China',
                'Nanjing University',
                'Wuhan University',
            ])
            ->get();

        $payload = [];
        foreach ($unis as $uni) {
            $payload[$uni->name] = ['slug' => $uni->slug];
        }

        return $payload;
    }

    public static function getCategoryLinks()
    {
        $cats = Category::query()
            ->select(['title', 'slug'])
            ->where('show_in_menu', '=', 1)
            ->get();

        $payload = [];
        foreach ($cats as $cat) {
            $payload[$cat->title] = ['slug' => $cat->slug];
        }

        return $payload;
    }
}

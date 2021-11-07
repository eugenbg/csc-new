<?php

namespace App\Models;

use App\Base\SluggableModel;

class ChinaUniversity extends SluggableModel
{
    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('china_university', ['china_universitySlug' => $this->slug]);
    }
}

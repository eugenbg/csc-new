<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Spell;

class SpellDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Spell::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['title'];

    /**
     * @var bool
     */
    protected $ops = true;

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes(Spell::query());
    }
}

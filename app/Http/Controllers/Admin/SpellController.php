<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\SpellDataTable;
use App\Models\Spell;
use App\Services\TextGenerationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;

class SpellController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = ['title' => 'required|string|max:200'];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\SpellDataTable $dataTable
     *
     * @return mixed
     */
    public function index(SpellDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.spell.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.spell', $this->formVariables('spell', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Spell::class, $request);
    }

    /**
     * @param \App\Models\Spell $spell
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Spell $spell)
    {
        return view('admin.spell', ['spell' => $spell]);
    }

    /**
     * @param \App\Models\Spell $spell
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Spell $spell)
    {
        $generated = Session::get('generated');
        return view('admin.forms.spell', array_merge($this->formVariables('spell', $spell), ['generated' => $generated]));
    }

    /**
     * @param \App\Models\Spell $spell
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Spell $spell, Request $request)
    {
        return $this->saveFlashRedirect($spell, $request);
    }

    /**
     * @param \App\Models\Spell $spell
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Spell $spell)
    {
        return $this->destroyFlashRedirect($spell);
    }

    public function generate($spellId, Request $request)
    {
        $inputText = $request->get('input');
        $spell = Spell::findOrFail($spellId);
        $result = TextGenerationService::generate(
            $inputText,
            $spell->prompt,
            $spell->tokens,
            $spell->temperature,
            $spell->top_p,
            $spell->frequency_penalty
        );

        return Redirect::route('admin.spell.edit', $spellId)->with( ['generated' => $result] );
    }
}

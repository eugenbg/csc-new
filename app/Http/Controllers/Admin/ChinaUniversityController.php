<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\ChinaUniversityDataTable;
use App\Models\ChinaUniversity;
use Illuminate\Http\Request;

class ChinaUniversityController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = ['title' => 'required|string|max:200', 'description' => 'required|string|max:160'];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ChinaUniversityDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ChinaUniversityDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.china_university.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.china_university', $this->formVariables('china_university', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(ChinaUniversity::class, $request);
    }

    /**
     * @param \App\Models\ChinaUniversity $china_university
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(ChinaUniversity $china_university)
    {
        return view('admin.show', ['object' => $china_university]);
    }

    /**
     * @param \App\Models\ChinaUniversity $china_university
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(ChinaUniversity $china_university)
    {
        return view('admin.forms.china_university', $this->formVariables('china_university', $china_university));
    }

    /**
     * @param \App\Models\ChinaUniversity $china_university
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(ChinaUniversity $china_university, Request $request)
    {
        return $this->saveFlashRedirect($china_university, $request);
    }

    /**
     * @param \App\Models\ChinaUniversity $china_university
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(ChinaUniversity $china_university)
    {
        return $this->destroyFlashRedirect($china_university);
    }
}

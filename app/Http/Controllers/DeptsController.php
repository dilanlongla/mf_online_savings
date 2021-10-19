<?php

namespace App\Http\Controllers;

use App\DataTables\DeptsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDeptsRequest;
use App\Http\Requests\UpdateDeptsRequest;
use App\Repositories\DeptsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DeptsController extends AppBaseController
{
    /** @var  DeptsRepository */
    private $deptsRepository;

    public function __construct(DeptsRepository $deptsRepo)
    {
        $this->deptsRepository = $deptsRepo;
    }

    /**
     * Display a listing of the Depts.
     *
     * @param DeptsDataTable $deptsDataTable
     * @return Response
     */
    public function index(DeptsDataTable $deptsDataTable)
    {
        return $deptsDataTable->render('depts.index');
    }

    /**
     * Show the form for creating a new Depts.
     *
     * @return Response
     */
    public function create()
    {
        return view('depts.create');
    }

    /**
     * Store a newly created Depts in storage.
     *
     * @param CreateDeptsRequest $request
     *
     * @return Response
     */
    public function store(CreateDeptsRequest $request)
    {
        $input = $request->all();

        $depts = $this->deptsRepository->create($input);

        Flash::success('Depts saved successfully.');

        return redirect(route('depts.index'));
    }

    /**
     * Display the specified Depts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $depts = $this->deptsRepository->find($id);

        if (empty($depts)) {
            Flash::error('Depts not found');

            return redirect(route('depts.index'));
        }

        return view('depts.show')->with('depts', $depts);
    }

    /**
     * Show the form for editing the specified Depts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $depts = $this->deptsRepository->find($id);

        if (empty($depts)) {
            Flash::error('Depts not found');

            return redirect(route('depts.index'));
        }

        return view('depts.edit')->with('depts', $depts);
    }

    /**
     * Update the specified Depts in storage.
     *
     * @param  int              $id
     * @param UpdateDeptsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeptsRequest $request)
    {
        $depts = $this->deptsRepository->find($id);

        if (empty($depts)) {
            Flash::error('Depts not found');

            return redirect(route('depts.index'));
        }

        $depts = $this->deptsRepository->update($request->all(), $id);

        Flash::success('Depts updated successfully.');

        return redirect(route('depts.index'));
    }

    /**
     * Remove the specified Depts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $depts = $this->deptsRepository->find($id);

        if (empty($depts)) {
            Flash::error('Depts not found');

            return redirect(route('depts.index'));
        }

        $this->deptsRepository->delete($id);

        Flash::success('Depts deleted successfully.');

        return redirect(route('depts.index'));
    }
}

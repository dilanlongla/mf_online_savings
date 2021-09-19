<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeptAPIRequest;
use App\Http\Requests\API\UpdateDeptAPIRequest;
use App\Models\Dept;
use App\Repositories\DeptRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DeptController
 * @package App\Http\Controllers\API
 */

class DeptAPIController extends AppBaseController
{
    /** @var  DeptRepository */
    private $deptRepository;

    public function __construct(DeptRepository $deptRepo)
    {
        $this->deptRepository = $deptRepo;
    }

    /**
     * Display a listing of the Dept.
     * GET|HEAD /depts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $depts = $this->deptRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($depts->toArray(), 'Depts retrieved successfully');
    }

    /**
     * Store a newly created Dept in storage.
     * POST /depts
     *
     * @param CreateDeptAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeptAPIRequest $request)
    {
        $input = $request->all();

        $dept = $this->deptRepository->create($input);

        return $this->sendResponse($dept->toArray(), 'Dept saved successfully');
    }

    /**
     * Display the specified Dept.
     * GET|HEAD /depts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dept $dept */
        $dept = $this->deptRepository->find($id);

        if (empty($dept)) {
            return $this->sendError('Dept not found');
        }

        return $this->sendResponse($dept->toArray(), 'Dept retrieved successfully');
    }

    /**
     * Update the specified Dept in storage.
     * PUT/PATCH /depts/{id}
     *
     * @param int $id
     * @param UpdateDeptAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeptAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dept $dept */
        $dept = $this->deptRepository->find($id);

        if (empty($dept)) {
            return $this->sendError('Dept not found');
        }

        $dept = $this->deptRepository->update($input, $id);

        return $this->sendResponse($dept->toArray(), 'Dept updated successfully');
    }

    /**
     * Remove the specified Dept from storage.
     * DELETE /depts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dept $dept */
        $dept = $this->deptRepository->find($id);

        if (empty($dept)) {
            return $this->sendError('Dept not found');
        }

        $dept->delete();

        return $this->sendSuccess('Dept deleted successfully');
    }
}

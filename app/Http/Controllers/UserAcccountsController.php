<?php

namespace App\Http\Controllers;

use App\DataTables\UserAcccountsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserAcccountsRequest;
use App\Http\Requests\UpdateUserAcccountsRequest;
use App\Repositories\UserAcccountsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserAcccountsController extends AppBaseController
{
    /** @var  UserAcccountsRepository */
    private $userAcccountsRepository;

    public function __construct(UserAcccountsRepository $userAcccountsRepo)
    {
        $this->userAcccountsRepository = $userAcccountsRepo;
    }

    /**
     * Display a listing of the UserAcccounts.
     *
     * @param UserAcccountsDataTable $userAcccountsDataTable
     * @return Response
     */
    public function index(UserAcccountsDataTable $userAcccountsDataTable)
    {
        return $userAcccountsDataTable->render('user_acccounts.index');
    }

    /**
     * Show the form for creating a new UserAcccounts.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_acccounts.create');
    }

    /**
     * Store a newly created UserAcccounts in storage.
     *
     * @param CreateUserAcccountsRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAcccountsRequest $request)
    {
        $input = $request->all();

        $userAcccounts = $this->userAcccountsRepository->create($input);

        Flash::success('User Acccounts saved successfully.');

        return redirect(route('userAcccounts.index'));
    }

    /**
     * Display the specified UserAcccounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userAcccounts = $this->userAcccountsRepository->find($id);

        if (empty($userAcccounts)) {
            Flash::error('User Acccounts not found');

            return redirect(route('userAcccounts.index'));
        }

        return view('user_acccounts.show')->with('userAcccounts', $userAcccounts);
    }

    /**
     * Show the form for editing the specified UserAcccounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userAcccounts = $this->userAcccountsRepository->find($id);

        if (empty($userAcccounts)) {
            Flash::error('User Acccounts not found');

            return redirect(route('userAcccounts.index'));
        }

        return view('user_acccounts.edit')->with('userAcccounts', $userAcccounts);
    }

    /**
     * Update the specified UserAcccounts in storage.
     *
     * @param  int              $id
     * @param UpdateUserAcccountsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAcccountsRequest $request)
    {
        $userAcccounts = $this->userAcccountsRepository->find($id);

        if (empty($userAcccounts)) {
            Flash::error('User Acccounts not found');

            return redirect(route('userAcccounts.index'));
        }

        $userAcccounts = $this->userAcccountsRepository->update($request->all(), $id);

        Flash::success('User Acccounts updated successfully.');

        return redirect(route('userAcccounts.index'));
    }

    /**
     * Remove the specified UserAcccounts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userAcccounts = $this->userAcccountsRepository->find($id);

        if (empty($userAcccounts)) {
            Flash::error('User Acccounts not found');

            return redirect(route('userAcccounts.index'));
        }

        $this->userAcccountsRepository->delete($id);

        Flash::success('User Acccounts deleted successfully.');

        return redirect(route('userAcccounts.index'));
    }
}

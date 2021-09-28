<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAccountAPIRequest;
use App\Http\Requests\API\UpdateUserAccountAPIRequest;
use App\Models\UserAccount;
use App\Repositories\UserAccountRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserAccountController
 * @package App\Http\Controllers\API
 */

class UserAccountAPIController extends AppBaseController
{
    /** @var  UserAccountRepository */
    private $userAccountRepository;

    public function __construct(UserAccountRepository $userAccountRepo)
    {
        $this->userAccountRepository = $userAccountRepo;
    }

    /**
     * Display a listing of the UserAccount.
     * GET|HEAD /userAccounts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userAccounts = $this->userAccountRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($userAccounts->toArray(), 'User Accounts retrieved successfully');
    }

    /**
     * Display a listing of the UserAccount.
     * GET|HEAD /userAccounts
     *
     * @param Request $request
     * @return Response
     */
    public function user_accounts_by_user_id($id, Request $request)
    {
        $userAccounts = $this->userAccountRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        )->where('user_id', $id);

        return $this->sendResponse($userAccounts->toArray(), 'User Accounts retrieved successfully');
    }

    /**
     * Store a newly created UserAccount in storage.
     * POST /userAccounts
     *
     * @param CreateUserAccountAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAccountAPIRequest $request)
    {
        $input = $request->all();

        $userAccount = $this->userAccountRepository->create($input);

        return $this->sendResponse($userAccount->toArray(), 'User Account saved successfully');
    }

    /**
     * Display the specified UserAccount.
     * GET|HEAD /userAccounts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserAccount $userAccount */
        $userAccount = $this->userAccountRepository->find($id);

        if (empty($userAccount)) {
            return $this->sendError('User Account not found');
        }

        return $this->sendResponse($userAccount->toArray(), 'User Account retrieved successfully');
    }

    /**
     * Update the specified UserAccount in storage.
     * PUT/PATCH /userAccounts/{id}
     *
     * @param int $id
     * @param UpdateUserAccountAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAccountAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserAccount $userAccount */
        $userAccount = $this->userAccountRepository->find($id);

        if (empty($userAccount)) {
            return $this->sendError('User Account not found');
        }

        $userAccount = $this->userAccountRepository->update($input, $id);

        return $this->sendResponse($userAccount->toArray(), 'UserAccount updated successfully');
    }

    /**
     * Remove the specified UserAccount from storage.
     * DELETE /userAccounts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserAccount $userAccount */
        $userAccount = $this->userAccountRepository->find($id);

        if (empty($userAccount)) {
            return $this->sendError('User Account not found');
        }

        $userAccount->delete();

        return $this->sendSuccess('User Account deleted successfully');
    }
}

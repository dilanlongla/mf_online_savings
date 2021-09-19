<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserAccount;

class UserAccountApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_account()
    {
        $userAccount = UserAccount::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_accounts', $userAccount
        );

        $this->assertApiResponse($userAccount);
    }

    /**
     * @test
     */
    public function test_read_user_account()
    {
        $userAccount = UserAccount::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/user_accounts/'.$userAccount->id
        );

        $this->assertApiResponse($userAccount->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_account()
    {
        $userAccount = UserAccount::factory()->create();
        $editedUserAccount = UserAccount::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_accounts/'.$userAccount->id,
            $editedUserAccount
        );

        $this->assertApiResponse($editedUserAccount);
    }

    /**
     * @test
     */
    public function test_delete_user_account()
    {
        $userAccount = UserAccount::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_accounts/'.$userAccount->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_accounts/'.$userAccount->id
        );

        $this->response->assertStatus(404);
    }
}

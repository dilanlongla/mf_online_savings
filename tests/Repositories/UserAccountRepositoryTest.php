<?php namespace Tests\Repositories;

use App\Models\UserAccount;
use App\Repositories\UserAccountRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserAccountRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserAccountRepository
     */
    protected $userAccountRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userAccountRepo = \App::make(UserAccountRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_account()
    {
        $userAccount = UserAccount::factory()->make()->toArray();

        $createdUserAccount = $this->userAccountRepo->create($userAccount);

        $createdUserAccount = $createdUserAccount->toArray();
        $this->assertArrayHasKey('id', $createdUserAccount);
        $this->assertNotNull($createdUserAccount['id'], 'Created UserAccount must have id specified');
        $this->assertNotNull(UserAccount::find($createdUserAccount['id']), 'UserAccount with given id must be in DB');
        $this->assertModelData($userAccount, $createdUserAccount);
    }

    /**
     * @test read
     */
    public function test_read_user_account()
    {
        $userAccount = UserAccount::factory()->create();

        $dbUserAccount = $this->userAccountRepo->find($userAccount->id);

        $dbUserAccount = $dbUserAccount->toArray();
        $this->assertModelData($userAccount->toArray(), $dbUserAccount);
    }

    /**
     * @test update
     */
    public function test_update_user_account()
    {
        $userAccount = UserAccount::factory()->create();
        $fakeUserAccount = UserAccount::factory()->make()->toArray();

        $updatedUserAccount = $this->userAccountRepo->update($fakeUserAccount, $userAccount->id);

        $this->assertModelData($fakeUserAccount, $updatedUserAccount->toArray());
        $dbUserAccount = $this->userAccountRepo->find($userAccount->id);
        $this->assertModelData($fakeUserAccount, $dbUserAccount->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_account()
    {
        $userAccount = UserAccount::factory()->create();

        $resp = $this->userAccountRepo->delete($userAccount->id);

        $this->assertTrue($resp);
        $this->assertNull(UserAccount::find($userAccount->id), 'UserAccount should not exist in DB');
    }
}

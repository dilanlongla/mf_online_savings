<?php namespace Tests\Repositories;

use App\Models\Dept;
use App\Repositories\DeptRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DeptRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DeptRepository
     */
    protected $deptRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->deptRepo = \App::make(DeptRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dept()
    {
        $dept = Dept::factory()->make()->toArray();

        $createdDept = $this->deptRepo->create($dept);

        $createdDept = $createdDept->toArray();
        $this->assertArrayHasKey('id', $createdDept);
        $this->assertNotNull($createdDept['id'], 'Created Dept must have id specified');
        $this->assertNotNull(Dept::find($createdDept['id']), 'Dept with given id must be in DB');
        $this->assertModelData($dept, $createdDept);
    }

    /**
     * @test read
     */
    public function test_read_dept()
    {
        $dept = Dept::factory()->create();

        $dbDept = $this->deptRepo->find($dept->id);

        $dbDept = $dbDept->toArray();
        $this->assertModelData($dept->toArray(), $dbDept);
    }

    /**
     * @test update
     */
    public function test_update_dept()
    {
        $dept = Dept::factory()->create();
        $fakeDept = Dept::factory()->make()->toArray();

        $updatedDept = $this->deptRepo->update($fakeDept, $dept->id);

        $this->assertModelData($fakeDept, $updatedDept->toArray());
        $dbDept = $this->deptRepo->find($dept->id);
        $this->assertModelData($fakeDept, $dbDept->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dept()
    {
        $dept = Dept::factory()->create();

        $resp = $this->deptRepo->delete($dept->id);

        $this->assertTrue($resp);
        $this->assertNull(Dept::find($dept->id), 'Dept should not exist in DB');
    }
}

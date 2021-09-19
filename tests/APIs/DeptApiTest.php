<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dept;

class DeptApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dept()
    {
        $dept = Dept::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/depts', $dept
        );

        $this->assertApiResponse($dept);
    }

    /**
     * @test
     */
    public function test_read_dept()
    {
        $dept = Dept::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/depts/'.$dept->id
        );

        $this->assertApiResponse($dept->toArray());
    }

    /**
     * @test
     */
    public function test_update_dept()
    {
        $dept = Dept::factory()->create();
        $editedDept = Dept::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/depts/'.$dept->id,
            $editedDept
        );

        $this->assertApiResponse($editedDept);
    }

    /**
     * @test
     */
    public function test_delete_dept()
    {
        $dept = Dept::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/depts/'.$dept->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/depts/'.$dept->id
        );

        $this->response->assertStatus(404);
    }
}

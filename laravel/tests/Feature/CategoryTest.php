<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test ID : Category-001
     * Description : Check if we can access the get all categories api
     * Test Steps : 1. Hit the get all categories api
     *              2. Check if the response status is 200
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_get_all_categories_api(): void
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }

    /**
     * Test ID : Category-002
     * Description : Check if we can create categories using api
     * Test Steps : 1. Hit the post category api
     *              2. Check if the response status is 201
     * Test Data : 
     *              name: test_category_01
     *              name: test_category_02
     * Expected Result : The response status should be 201
     * Actual Result : The response status is 201
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_create_category_api(): void
    {
        $response = $this->postJson('/api/categories', [
            "name" => "test_category_01"
        ]);
        $response->assertStatus(201)->assertJson(['name' => "test_category_01"]);

        $response = $this->postJson('/api/categories', [
            "name" => "test_category_02"
        ]);
        $response->assertStatus(201)->assertJson(['name' => "test_category_02"]);
    }

    /**
     * Test ID : Category-003
     * Description : Check if we can access certain categories api
     * Test Steps : 1. Hit the get category by id api
     *              2. Check if the response status is 200
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
     public function test_if_we_can_access_certain_category_api(): void
     {
        $response = $this->get('/api/categories/1');

        $response->assertStatus(200)->assertJson(['id' => $response["id"]]);
     }

    /**
     * Test ID : Category-004
     * Description : Check if we can update certain category using api
     * Test Steps : 1. Hit the patch category api
     *              2. Check if the response status is 200
     *              3. Check if it is updated
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_update_category_api(): void
    {
        $response = $this->patch('/api/categories/1', ["name" => "test_category_updated"]);

        $response->assertStatus(200)->assertJson(["id" => $response['id'], "name" => $response['name']]);
    }

    /**
     * Test ID : Category-005
     * Description : Check if we can delete category using api
     * Test Steps : 1. Hit the delete category api
     *              2. Check if the response status is 200
     *              3. Check if it is deleted
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_delete_category_by_id_api(): void
    {
        $response = $this->delete('/api/categories/2');
        $response->assertStatus(200)->assertJson(["id" => $response['id']]);

        $this
            ->get('/api/categories/2')
            ->assertStatus(200)
            ->assertDontSee(["id" => $response['id']]);
    }
}   

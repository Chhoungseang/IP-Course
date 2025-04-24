<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test ID : Product-001
     * Description : Check if we can access the get all products api
     * Test Steps : 1. Hit the get all products api
     *              2. Check if the response status is 200
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_get_all_products_api(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * Test ID : Product-002
     * Description : Check if we can create products using api
     * Test Steps : 1. Hit the post product api
     *              2. Check if the response status is 201
     * Test Data : 
     *              name: test_product_01
     *              pricing: 100
     *              category_id: 1
     *              name: test_product_02
     *              pricing: 200
     *              category_id: 1
     * Expected Result : The response status should be 201
     * Actual Result : The response status is 201
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_create_product_api(): void
    {
        $response = $this->postJson('/api/products', [
            "name" => "test_product_01",
            "pricing" => 100,
            "category_id" => 1,
        ]);
        $response->assertStatus(201)->assertJson(['name' => "test_product_01", 'pricing' => $response["pricing"], 'category_id' => $response["category_id"]]);

        $response = $this->postJson('/api/products', [
            "name" => "test_product_02",
            "pricing" => 200,
            "category_id" => 1,
        ]);
        $response->assertStatus(201)->assertJson(['name' => "test_product_02", 'pricing' => $response["pricing"], 'category_id' => $response["category_id"]]);
    }

    /**
     * Test ID : Product-003
     * Description : Check if we can access certain product api
     * Test Steps : 1. Hit the get product by id api
     *              2. Check if the response status is 200
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_certain_product_api(): void
    {
       $response = $this->get('/api/products/1');

       $response->assertStatus(200)->assertJson(['id' => $response["id"]]);
    }

    /**
     * Test ID : Product-004
     * Description : Check if we can update certain product using api
     * Test Steps : 1. Hit the patch product api
     *              2. Check if the response status is 200
     *              3. Check if it is updated
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_update_certain_product_api(): void
    {
        $response = $this->patch('api/products/1', [
            "name" => "test_product_updated",
            "pricing" => 300,
            "category_id" => 1
        ]);

        $response->assertStatus(200)->assertJson([
            "id" => $response['id'],
            "name" => $response['name'],
            "pricing" => $response['pricing'],
            "category_id" => $response['category_id']
        ]);
    }

    /**
     * Test ID : Product-005
     * Description : Check if we can delete product using api
     * Test Steps : 1. Hit the delete category api
     *              2. Check if the response status is 200
     *              3. Check if it is deleted
     * Test Data : none
     * Expected Result : The response status should be 200
     * Actual Result : The response status is 200
     * Status: Passed
     * Remark : None
     */
    public function test_if_we_can_access_delete_certain_product_by_id_api(): void
    {
        $response = $this->delete('/api/products/2');
        $response->assertStatus(200)->assertJson(["id" => $response['id']]);

        $this
            ->get('/api/products/2')
            ->assertStatus(200)
            ->assertDontSee(["id" => $response['id']]);
    }

}

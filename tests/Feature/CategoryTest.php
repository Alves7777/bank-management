<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_category()
    {
        $data = [
            'name' => 'Alimentação',
            'description' => 'Despesas com alimentação',
        ];
        $response = $this->postJson('/api/v1/category', $data);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'Alimentação']);
        $this->assertDatabaseHas('categories', $data);
    }

    public function test_can_list_categories()
    {
        Category::factory()->count(2)->create();
        $response = $this->getJson('/api/v1/category');
        $response->assertStatus(201)->assertJsonStructure(['data']);
    }

    public function test_can_update_category()
    {
        $category = Category::factory()->create();
        $response = $this->putJson('/api/v1/category/'.$category->id, ['name' => 'Nova Categoria']);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'Nova Categoria']);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();
        $response = $this->deleteJson('/api/v1/category/'.$category->id);
        $response->assertStatus(201);
        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }
}

<?php

use Tests\TestCase;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

class CategoryControllerTest extends TestCase
{

    /** @test */
    public function can_list_all_categories()
    {
        $this->seed(); // Sembramos la base de datos para tener datos de prueba

        $response = $this->get('/api/categories');

        $response->assertStatus(200)
                 ->assertJsonCount(Category::count());
    }

    /** @test */
    public function can_show_category_by_id()
    {
        $category = Category::factory()->create(['category' => 'Category Test']);

        $response = $this->get('/api/categories/' . $category->id);

        $response->assertStatus(200)
                 ->assertJson(['id' => $category->id]); // Ajustar según la estructura de tu respuesta JSON
    }

    /** @test */
    public function can_store_category()
    {
        $categoryData = [
            'category' => 'Test Category',
        ];

        $response = $this->post('/api/categories', $categoryData);

        $response->assertStatus(201)
                 ->assertJson($categoryData);

        $this->assertDatabaseHas('categories', $categoryData);
    }

    /** @test */
public function can_update_category()
{
    // Crear una categoría
    $category = Category::factory()->create();

    // Definir los datos actualizados de la categoría
    $updatedCategoryData = [
        'category' => 'Updated Category Name',
    ];

    // Crear una instancia del controlador
    $controller = new CategoryController();

    // Llamar al método update del controlador para actualizar la categoría
    $response = $controller->update(new Request($updatedCategoryData), $category->id);

    // Verificar que la respuesta tiene el código de estado HTTP 200 (OK)
    $this->assertEquals(200, $response->status());

    // Verificar que la categoría ha sido actualizada en la base de datos
    $this->assertDatabaseHas('categories', $updatedCategoryData);
}
}

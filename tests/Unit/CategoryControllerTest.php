<?php

use Tests\TestCase;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseTransactions; 

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions; 
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

    // Llamar al método update del controlador para actualizar la categoría
    $response = $this->put('api/categories/' . $category->id, $updatedCategoryData);

    // Verificar que la respuesta tiene el código de estado HTTP 200 (OK)
    $response->assertStatus(200)
             ->assertJson([
                 'id' => $category->id,
                 'category' => 'Updated Category Name',
                 // Asegúrate de incluir cualquier otro campo que esperes en la respuesta JSON
             ]);

    // Verificar que la categoría ha sido actualizada en la base de datos
    $this->assertDatabaseHas('categories', $updatedCategoryData);
}

    /** @test */
    public function can_delete_category()
    {
    // Sembrar una categoría en la base de datos
    $category = Category::factory()->create();

    // Llamamos al método destroy del controlador a través de una solicitud HTTP DELETE
    $response = $this->delete('/api/categories/' . $category->id);

    // Verificamos que se haya devuelto una respuesta con el código 204 (sin contenido)
    $response->assertStatus(204);

    // Verificamos que la categoría haya sido eliminada de la base de datos
    $this->assertNull(Category::find($category->id));
    }
}

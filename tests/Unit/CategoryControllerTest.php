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
        // Obtener la cantidad de categorías existentes en la base de datos
        $existingCategoriesCount = Category::count();

        // Crear una instancia del controlador
        $controller = new CategoryController();

        // Llamar al método index del controlador
        $response = $controller->index();

        // Convertir la respuesta JSON en un array
        $responseArray = $response->jsonSerialize();

        // Comprobar que la cantidad de categorías en la respuesta es igual a la cantidad existente en la base de datos
        $this->assertCount($existingCategoriesCount, $responseArray);

        // Comprobar que cada elemento del array tiene el campo 'category'
        foreach ($responseArray as $category) {
            $this->assertArrayHasKey('category', $category);
        }
    }

    /** @test */
    public function can_show_category_by_id()
    {
     // Crear una categoría
    $category = Category::factory()->create();

    // Crear una instancia del controlador
    $controller = new CategoryController();

    // Llamar al método show del controlador para mostrar la categoría por ID
    $response = $controller->show($category->id);

    // Verificar que la respuesta tiene el código de estado HTTP 200 (OK)
    $this->assertEquals(200, $response->status());
        
    }
}







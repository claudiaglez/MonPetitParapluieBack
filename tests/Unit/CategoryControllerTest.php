<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControllerTest extends TestCase
{
   /** @test */
   public function can_list_all_categories()
   {
       // Crear tres categorías
       Category::factory()->count(3)->create();

       // Crear una instancia del controlador
       $controller = new CategoryController();

       // Llamar al método index del controlador
       $response = $controller->index();

       // Comprobar que el resultado es un array
       $this->assertIsArray($response);

       // Comprobar que hay tres elementos en el array
       $this->assertCount(3, $response);

       // Comprobar que cada elemento del array tiene el campo 'category'
       foreach ($response as $category) {
           $this->assertArrayHasKey('category', $category);
       }
   }
}


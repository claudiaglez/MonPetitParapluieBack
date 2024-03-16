<?php

use Tests\TestCase;
use App\Models\Article;
use App\Http\Controllers\ArticleController;

class ArticleControllerTest extends TestCase
{
    /** @test */
    public function can_list_all_articles()
    {
        // Crear una instancia del controlador
        $controller = new ArticleController();

        // Llamar al método index del controlador
        $response = $controller->index();

        // Convertir la respuesta JSON en un array
        $responseArray = json_decode($response->getContent(), true);

        // Verificar que la respuesta contiene al menos un elemento en el array 'data'
        $this->assertArrayHasKey('data', $responseArray);
        $this->assertIsArray($responseArray['data']);
        $this->assertGreaterThan(0, count($responseArray['data']));

        // Verificar que cada artículo en la respuesta tiene los campos esperados
        foreach ($responseArray['data'] as $article) {
            $this->assertArrayHasKey('id', $article);
            $this->assertArrayHasKey('title', $article);
            $this->assertArrayHasKey('image_url', $article);
            $this->assertArrayHasKey('description', $article);
            $this->assertArrayHasKey('categories_id', $article);
        }
    }
}



<?php

use Tests\TestCase;
use App\Models\Article;
use App\Http\Controllers\ArticleController;

class ArticleControllerTest extends TestCase
{
    /** @test */
    public function can_list_all_articles()
    {
        // Obtener la cantidad de artículos existentes en la base de datos
        $existingArticlesCount = Article::count();

        // Crear una instancia del controlador
        $controller = new ArticleController();

        // Llamar al método index del controlador
        $response = $controller->index();

        // Convertir la respuesta JSON en un array
        $responseArray = json_decode($response->getContent(), true);

        // Comprobar que la cantidad de artículos en la respuesta es igual a la cantidad existente en la base de datos
        $this->assertCount($existingArticlesCount, $responseArray);

        // Comprobar que cada elemento del array tiene los campos esperados
        foreach ($responseArray as $article) {
            $this->assertArrayHasKey('id', $article);
            $this->assertArrayHasKey('title', $article);
            $this->assertArrayHasKey('image_url', $article);
            $this->assertArrayHasKey('description', $article);
            $this->assertArrayHasKey('categories_id', $article); 
        }
    }
}





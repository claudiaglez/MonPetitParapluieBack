<?php

use Illuminate\Foundation\Testing\DatabaseTransactions; 
use Tests\TestCase;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\ArticleController;

class ArticleControllerTest extends TestCase
{

    use DatabaseTransactions; 
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

     /** @test */
     public function can_show_an_article()
     {
        {
            $article = Article::factory()->create();
    
            $response = $this->get('/api/articles/' . $article->id);
    
            $response->assertStatus(200)
                ->assertJson([
                    'status' => 200,
                    'data' => $article->toArray(),
                ]);
        }
     }

 /** @test */
public function can_create_an_article()
{
    // Define article data
    $articleData = [
        'title' => 'Test Article',
        'image_url' => 'https://example.com/image.jpg',
        'description' => 'This is a test article.',
        'categories_id' => 1,
    ];

    // Call the store method with the article data
    $response = $this->post('api/articles', $articleData);

    // Assert the response status code is 201 (created)
    $response->assertStatus(201);

    // Assert the response JSON contains the expected data
    $response->assertJson([
        'status' => 201,
        'data' => $articleData,
    ]);

    // Assert the article is created in the database
    $this->assertDatabaseHas('articles', $articleData);
}

/** @test */
public function can_update_an_article()
{
    // Create an article
    $article = Article::factory()->create();

    // Update data for the article
    $updatedData = [
        'title' => 'Updated Title',
        'description' => 'Updated description.',
    ];

    // Call the update method with the updated data
    $response = $this->put('api/articles/' . $article->id, $updatedData);

    // Assert the response
    $response->assertStatus(200)
             ->assertJson([
                 'status' => 200,
                 'data' => $updatedData,
             ]);

    // Assert the article is updated in the database
    $this->assertDatabaseHas('articles', $updatedData);
}

 /** @test */
 public function can_delete_an_article()
    {
    // Creamos un artículo de prueba para eliminarlo
    $article = Article::factory()->create();

    // Llamamos al método destroy del controlador
    $controller = new ArticleController();
    $response = $controller->destroy($article->id);

    // Verificamos que se haya devuelto una respuesta 204 (sin contenido)
    $this->assertEquals(204, $response->getStatusCode());

    // Verificamos que el artículo haya sido eliminado de la base de datos
    $this->assertNull(Article::find($article->id));
    }
}

 




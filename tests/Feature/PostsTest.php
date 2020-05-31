<?php
namespace Tests\Feature;

use App\Post;
use  PHPUnit\Framework\TestCase;

class PostsTest extends TestCase
{
    /** @test */
    public function the_posts_show_route_can_be_accessed()
    {
        // Arrange
        // Dodajmy do bazy danych wpis
        $post = Post::create([
            'title' => 'test tytul',
            'trailer' => 'test trailer',
            'content' => 'test content',
            'user_id' => 1,
            'category_id' => 1,
            'publish' => 1,
        ]);
        $post->save();

        // Act
        // Wykonajmy zapytanie pod adres wpisu
        $response = $this->get('/posts/'.$post->id);

        // Assert
        // Sprawdzamy że w odpowiedzi znajduje się tytuł wpisu
        $response->assertStatus(200);
    }
}

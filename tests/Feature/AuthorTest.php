<?php

use App\Models\Author;
use Tests\TestCase;

uses(TestCase::class);

it('Verifica Endpoint de Autores', function () {
    $response = $this->get('/author')
        ->seeStatusCode(200);
});

it('cria um autor com dados válidos', function () {
    $response = $this->post('/author', [
        'name' => 'Machado de Assis',
        'status' => true,
    ]);

    $this->seeInDatabase('authors', [
        'name' => 'Machado de Assis',
        'status' => true,
    ]);

    $this->assertResponseStatus(302);

    $location = $this->response->headers->get('Location');
    $path = parse_url($location, PHP_URL_PATH);

    $this->assertEquals('/author', $path);
});

it('lista autores existentes', function () {
    Author::factory()->create([
        'name' => 'Autor Teste',
        'status' => true,
    ]);

    $this->get('/author');
    $this->assertResponseStatus(200);
    $this->assertStringContainsString('Autor Teste', $this->response->getContent());
});
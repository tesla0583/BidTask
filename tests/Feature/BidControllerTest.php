<?php

namespace Tests\Feature;

use App\Models\Bid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BidControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGet(): void
    {
        $response = $this->getJson('/api/requests');

        $response->assertStatus(200);
    }

    public function testPost(): void
    {
        $response = $this->postJson('/api/requests', [
            'email' => 'test@test.com',
            'message' => 'test'
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'message',
                'status',
                'comment',
            ]
        ]);

        $data = $response->decodeResponseJson();
        $this->assertEquals('test', $data['data']['message']);
        $this->assertDatabaseHas(Bid::class, ['id' => $data['data']['id']]);
    }

    public function testPut(): void
    {
        $response = $this->putJson('/api/requests/3', [
            'comment' => 'test4'
        ]);

        $response->assertStatus(200);
        $data = $response->decodeResponseJson();
        $this->assertDatabaseHas(Bid::class, ['comment' => $data['data']['comment']]);
    }
}

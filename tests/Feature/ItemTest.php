<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Item;
use Database\Factories\ItemFactory;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_item()
    {
        $data = [
            'name' => 'Sample Item',
            'description' => 'This is a test item',
        ];

        $response = $this->post('/items', $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('items', $data);
    }
    public function test_can_update_an_item()
    {
        $item = Item::factory()->create();
        $data = [
            'name' => 'Updated Item Name',
            'description' => 'Updated item description.',
        ];

        $response = $this->put("/items/{$item->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('items', $data);
    }

    public function test_can_delete_an_item()
    {
        $item = Item::factory()->create();

        $response = $this->delete("/items/{$item->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('items', ['id' => $item->id]);
    }
}
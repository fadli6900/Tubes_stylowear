<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_access_orders_index()
    {
        $this->actingAs($this->admin);

        $response = $this->get(route('admin.orders.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.orders.index');
    }

    public function test_admin_can_create_order()
    {
        $this->actingAs($this->admin);

        $user = User::factory()->create();

        $data = [
            'user_id' => $user->id,
            'total' => 100000,
            'status' => 'pending',
        ];

        $response = $this->post(route('admin.orders.store'), $data);

        $response->assertRedirect(route('admin.orders.index'));
        $this->assertDatabaseHas('orders', $data);
    }

    public function test_admin_can_update_order()
    {
        $this->actingAs($this->admin);

        $order = Order::factory()->create();

        $data = [
            'user_id' => $order->user_id,
            'total' => 200000,
            'status' => 'shipped',
        ];

        $response = $this->put(route('admin.orders.update', $order), $data);

        $response->assertRedirect(route('admin.orders.index'));
        $this->assertDatabaseHas('orders', $data);
    }

    public function test_admin_can_delete_order()
    {
        $this->actingAs($this->admin);

        $order = Order::factory()->create();

        $response = $this->delete(route('admin.orders.destroy', $order));

        $response->assertRedirect(route('admin.orders.index'));
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}

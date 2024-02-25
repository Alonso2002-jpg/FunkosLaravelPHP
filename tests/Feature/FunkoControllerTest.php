<?php
namespace Tests\Feature;

use App\Models\Funko;
use App\Models\User;
use Database\Factories\FunkoFactory;
use Tests\TestCase;

class FunkoControllerTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function test_index(){
        $response = $this->get('/funkos');
        $response->assertViewIs('funkos.content');
        $response->assertViewHas('funkos');
        $response->assertStatus(200);
    }


    public function test_show_view(){
        $funko = Funko::first();
        $response = $this->get('/funkos/1', $funko->toArray());
        $response->assertViewIs('funkos.details');
        $response->assertViewHas('funko', $funko);
    }

    public function test_create_view_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($usuario)->get('/funkos/create/funko');
        $response->assertViewIs('funkos.create');
        $response->assertStatus(200);
    }

    public function test_create_view_user(){
        $usuario = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($usuario)->get('/funkos/create/funko');
        $response->assertRedirectToRoute('funkos.index');
        $response->assertStatus(302);
    }

    public function test_create_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $funko = FunkoFactory::new()->create(); // Utiliza el Factory correcto
        $response = $this->actingAs($usuario)->get('/funkos', $funko->toArray());
        $response->assertViewIs('funkos.content');
    }

    public function test_update_view_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $funko = Funko::first();
        $response = $this->actingAs($usuario)->get('/funkos/1/edit', $funko->toArray());
        $response->assertViewIs('funkos.update');
        $response->assertViewHas('funko', $funko);
    }

    public function test_update_view_user(){
        $usuario = User::factory()->create(['role' => 'user']);
        $funko = Funko::first();
        $response = $this->actingAs($usuario)->get('/funkos/1/edit', $funko->toArray());
        $response->assertRedirectToRoute('funkos.index');
        $response->assertStatus(302);
    }


    public function test_update_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $funko = Funko::first();
        $response = $this->actingAs($usuario)->put('/funkos/1', $funko->toArray());
        $response->assertRedirect('/');
    }


    public function test_delete_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $funko = Funko::first();
        $response = $this->actingAs($usuario)->delete('/funkos/' . $funko->id, $funko->toArray());
        $response->assertRedirect('/funkos/gestion');
    }

    public function test_delete_user(){
        $usuario = User::factory()->create(['role' => 'user']);
        $funko = Funko::first();
        $response = $this->actingAs($usuario)->delete('/funkos/' . $funko->id, $funko->toArray());
        $response->assertRedirectToRoute('funkos.index');
        $response->assertStatus(302);
    }

}

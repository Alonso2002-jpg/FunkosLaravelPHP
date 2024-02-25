<?php
namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Tests\TestCase;
class CategoryControllerTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }


    public function test_index_with_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($usuario)->get('/category/gestion');
        $response->assertViewIs('category.gestion');
        $response->assertStatus(200);
    }

    public function test_index_with_user(){
        $usuario = User::factory()->create();
        $response = $this->actingAs($usuario)->get('/category/gestion');
        $response->assertRedirectToRoute('funkos.index');
        $response->assertStatus(302);
    }

    public function test_create_view_with_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($usuario)->get('/category/create');
        $response->assertViewIs('category.create');
        $response->assertStatus(200);
    }

    public function test_create_view_with_user(){
        $usuario = User::factory()->create();
        $response = $this->actingAs($usuario)->get('/category/create');
        $response->assertRedirectToRoute('funkos.index');
        $response->assertStatus(302);
    }

    public function test_create_with_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $categoria = Category::factory()->make(['name' => 'Nombre de Categoria']);
        $response = $this->actingAs($usuario)->post('/category', $categoria->toArray());
        $response->assertRedirect('/category/gestion');
    }

    public function test_update_view_with_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $categoria = Category::first();
        $response = $this->actingAs($usuario)->get('/category/1/edit');
        $response->assertViewIs('category.update');
        $response->assertViewHas('category', $categoria);
        $response->assertStatus(200);
    }

    public function test_update_view_with_user(){
        $usuario = User::factory()->create();
        $response = $this->actingAs($usuario)->get('/category/1/edit');
        $response->assertRedirectToRoute('funkos.index');
        $response->assertStatus(302);
    }

    public function test_update_with_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $categoria = Category::first();
        $categoria->name = "Nombre nuevo";
        $response = $this->actingAs($usuario)->put('/category/1', $categoria->toArray());
        $response->assertRedirect('/category/gestion');
    }

    public function test_delete_with_admin(){
        $usuario = User::factory()->create(['role' => 'admin']);
        $categoria = Category::first();
        $response = $this->actingAs($usuario)->delete('/category/1', $categoria->toArray());
        $response->assertRedirect('/category/gestion');
    }

    public function test_delete_with_user(){
        $usuario = User::factory()->create(['role' => 'user']);
        $categoria = Category::first();
        $response = $this->actingAs($usuario)->delete('/category/1', $categoria->toArray());
        $response->assertRedirect('/funkos');
        $response->assertStatus(302);
    }

    public function test_restore_with_admin()
    {
        $usuario = User::factory()->create(['role' => 'admin']);
        $categoria = Category::first();
        $response = $this->actingAs($usuario)->delete('/category/1/restore', $categoria->toArray());
        $response->assertRedirect('/category/gestion');
    }

    public function test_restore_with_user()
    {
        $usuario = User::factory()->create(['role' => 'user']);
        $categoria = Category::first();
        $response = $this->actingAs($usuario)->delete('/category/1/restore', $categoria->toArray());
        $response->assertRedirect('/funkos');
        $response->assertStatus(302);
    }
}

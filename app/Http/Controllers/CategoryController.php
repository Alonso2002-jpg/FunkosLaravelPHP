<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Funko;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 60, function (){
            return Category::all();
        });
        return view('category.gestion')->with('categories', $categories);
    }

    public function create()
    {
        $categories = Cache::remember('categories', 60, function (){
            return Category::all();
        });
        return view('category.create')->with('categories', $categories);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'min:4|max:255|required',
        ]);

        try {
            $category = new Category();
            $category->nameCategory = strtoupper($request->name);
            $category->isDeleted = $request->has('deleted');
            $category->save();
            flash('Categoría creada exitosamente')->success()->important();
            return redirect()->route('categories.gestion');
        }catch (Exception $e){
            flash('Error al crear la categoría')->error()->important();
            return redirect()->back();
        }
    }

    public function edit($id){
        $category = Cache::remember('category-' . $id, 60, function () use($id){
            return Category::find($id);
        });
        $categories = Cache::remember('categories', 60, function (){
            return Category::all();
        });
        return view('category.update')->with('category', $category)->with('categories', $categories);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'min:4|max:255|required',
        ]);

        try {

            $category = Cache::remember('category-' . $id, 60, function () use($id){
                return Category::find($id);
            });
            $category->nameCategory = strtoupper($request->name);
            $category->isDeleted = $request->has('deleted');
            Cache::forget('category-' . $id);
            Cache::forget('categories');
            $category->save();
            flash('Categoría actualizada exitosamente')->success()->important();
            return redirect()->route('categories.gestion');
        }catch (Exception $e){
            flash('Error al actualizar la categoría')->error()->important();
            return redirect()->back();
        }
    }

    public function destroy($id){
        try {
            $category = Cache::remember('category-' . $id, 60, function () use($id){
                return Category::find($id);
            });
            $funkosCate = $category->funkos;

            if (count($category->funkos)>0) {
                foreach ($funkosCate as $funko) {
                    $funko->category_id = 8;
                    $funko->save();
                }
            }
            $category->isDeleted = true;
            Cache::forget('category-' . $id);
            Cache::forget('categories');
            $category->save();
            flash('Categoría eliminada exitosamente')->success()->important();
            return redirect()->route('categories.gestion');
        } catch (Exception $e) {
            flash('Error al eliminar la categoría' . $e)->error()->important();
            return redirect()->back();
        }
    }


    public function restore($id)
    {
        try {
            $category = Cache::remember('category-' . $id, 60, function () use($id){
                return Category::find($id);
            });
            $category->isDeleted = false;
            Cache::forget('category-' . $id);
            Cache::forget('categories');
            $category->save();
            flash('Categoría restaurada exitosamente')->success()->important();
            return redirect()->route('categories.gestion');
        } catch (Exception $e) {
            flash('Error al restaurar la categoría' . $e)->error()->important();
            return redirect()->back();
        }
    }

}

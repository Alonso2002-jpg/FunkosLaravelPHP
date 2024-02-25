<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Funko;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class FunkosController extends Controller
{
    public function index(Request $request)
    {
        $categories = $this->getAllCategories();
        if (auth()->check() && auth()->user()->role == 'admin') {
            $funkos = Funko::search($request->search)->orderBy('id', 'asc')->paginate(8);
        }else{
            $funkos = Funko::where('category_id', '!=', 8)
                ->search($request->search)
                ->orderBy('id', 'asc')
                ->paginate(8);
        }
        return view('funkos.content')->with('funkos', $funkos)->with('categories', $categories);
    }

    public function gestion(Request $request)
    {
        $categories = $this->getAllCategories();
        $funkos = Funko::search($request->search)->orderBy('id', 'asc')->paginate(4);

        return view('funkos.gestion')->with('funkos', $funkos)->with('categories', $categories);
    }
    public function funkosByCate($category)
    {
        $categories = $this->getAllCategories();
        $categoryFind = Category::findOrFail($category);
        $funkosCate = Funko::where('category_id', $category)->paginate(4);
        return view('funkos.content')->with('funkos', $funkosCate)->with('categories', $categories)->with('nameCate', $categoryFind->nameCategory);
    }

    public function show($id){
        $funko = Cache::remember('funkoFind' . $id, 60, function () use ($id) {
            return Funko::find($id);
        });
        $categories = $this->getAllCategories();
        return view('funkos.details')->with('funko', $funko)->with('categories', $categories);
    }

    public function create()
    {
        $categories = Category::where('id', '!=', 8)
            ->where('isDeleted',0)
            ->get();
        return view('funkos.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:4|max:255|required',
            'description' => 'min:4|max:255|required',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'category' => 'required|exists:categories,id',
        ]);

        try {

            $funko = new Funko($request->all());
            $funko->category_id = $request->category;
            $funko->img = Funko::$IMAGE_DEFAULT;
            $funko->save();

            flash('Funko creado exitosamente')->success()->important();
            return redirect()->route('funkos.gestion');
        }catch (Exception $e){
            flash('Error al crear el funko'. $e)->error()->important();
            return redirect()->back();
        }
    }

    public function edit($id){
        $funko = Cache::remember('funkoFind' . $id, 60, function () use ($id) {
            return Funko::find($id);
        });
        $categories = Category::where('id', '!=', 8)
            ->where('isDeleted',0)
            ->get();
        return view('funkos.update')->with('funko', $funko)->with('categories', $categories);
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'min:4|max:255|required',
            'description' => 'min:4|max:255|required',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'category' => 'required|exists:categories,id',
        ]);

        try {

            $funko = Cache::remember('funkoFind' . $id, 60, function () use ($id) {
                return Funko::find($id);
            });
            $funko->update($request->all());
            $funko->category_id = $request->category;
            Cache::forget('funkoFind' . $id);
            $funko->save();

            flash('Funko actualizado exitosamente')->success()->important();
            return redirect()->route('funkos.gestion');
        }catch (Exception $e){
            flash('Error al actualizar el funko')->error()->important();
            return redirect()->back();
        }
    }
    public function goUpdImg($id)
    {
        $categories = $this->getAllCategories();
        $funko = Cache::remember('funkoFind' . $id, 60, function () use ($id) {
            return Funko::find($id);
        });
        return view('funkos.update-img')->with('funko', $funko)->with('categories', $categories);
    }

    public function updImg(Request $request, $id){
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $funko = Cache::remember('funkoFind' . $id, 60, function () use ($id) {
                return Funko::find($id);
            });

            if ($funko->img != Funko::$IMAGE_DEFAULT && Storage::exists($funko->img)){
                Storage::delete($funko->img);
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $imgToSave = $funko->id . '.' . $ext;
            $funko->img = $img->storeAs('funkos', $imgToSave, 'public');
            Cache::forget('funkoFind' . $id);
            $funko->save();

            flash('Imagen actualizada exitosamente')->success()->important();
            return redirect()->route('funkos.gestion');
        }catch (Exception $e){
            flash('Error al actualizar la imagen')->error()->important();
            return redirect()->back();
        }
    }

    public function destroy($id){
        try {
            $funko = Cache::remember('funkoFind' . $id, 60, function () use ($id) {
                return Funko::find($id);
            });
            if ($funko->img != Funko::$IMAGE_DEFAULT && Storage::exists('public/' . $funko->img)){
                Storage::delete('public/' . $funko->img);
            }
            Cache::forget('funkoFind' . $id);
            $funko->delete();
            flash('Funko eliminado exitosamente')->success()->important();
            return redirect()->route('funkos.gestion');
        }catch (Exception $e){
            flash('Error al eliminar el funko')->error()->important();
            return redirect()->back();
        }
    }

    public function getAllCategories()
    {
        $categories = Cache::remember('categories',60, function (){
            return Category::all();
        });

        return $categories;
    }
}

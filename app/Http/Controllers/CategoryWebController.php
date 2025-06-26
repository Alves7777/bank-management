<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Exception;

class CategoryWebController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        $this->service->create($validated);
        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $category = $this->service->find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);
        try {
            $this->service->update($id, $validated);
            return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->delete($id);
            return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function show($id)
    {
        $category = $this->service->find($id);
        return response()->json($category);
    }
}

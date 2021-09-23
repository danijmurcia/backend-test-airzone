<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    /**
     * Return data and related posts
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {

            $users = Category::with('posts')->get();

        } catch (\Exception $e) {
            return sendError($e->getMessage());
        }

        return sendResponse($users, 'Categorías listados correctamente');
    }

    /**
     * Show category by id (model)
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        return sendResponse($category);
    }

    /**
     * Store data
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function store(CategoryRequest $request)
    {
        try {

            $category = new Category($request->all());
            $category->saveOrFail();

        } catch (\Exception $e) {
            return sendError($e->getMessage());
        }

        return sendResponse($category, 'Categoria creada correctamente');
    }

    /**
     * Update data by ID (model)
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return JsonResponse
     * @throws \Throwable
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {

            $category->fill($request->all());
            $category->saveOrFail();

        } catch (\Exception $e) {
            return sendError($e->getMessage());
        }

        return sendResponse($category, 'Categoria editada correctamente');
    }

    /**
     * Delete data by ID (model)
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category)
    {
        return destroy($category, 'Categoria');
    }
}

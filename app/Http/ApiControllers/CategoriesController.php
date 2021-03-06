<?php
namespace App\Http\ApiControllers;

use App\Models\Category;
use App\Transformers\CategoryTransformer;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return $this->response()->collection($data, new CategoryTransformer());
    }
}

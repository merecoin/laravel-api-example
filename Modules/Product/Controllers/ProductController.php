<?php

namespace Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Resources\ProductCollection;
use Modules\Product\Models\Product;
use Modules\Product\Resources\ProductResource;
use Modules\Product\Services\ProductRepositoryService;
use Modules\Helpers\QueryStringHelper;

class ProductController extends Controller
{

    protected ProductRepositoryService $productRepositoryService;

    protected $paginateLimit = 3;

    public function __construct(ProductRepositoryService $productRepositoryService)
    {
        $this->productRepositoryService = $productRepositoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginateLimit = $request->query('limit', $this->paginateLimit);
        $categoriesCollection = Product::paginate($paginateLimit);

        if ($categories = $request->query('categories')) {
            $categoriesCollection = $this->productRepositoryService->getProducts(
                QueryStringHelper::fromCommaSeparatedToCollection(
                    $categories
                ),
                $paginateLimit
            );
        }

        return new ProductCollection(
            $categoriesCollection
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}

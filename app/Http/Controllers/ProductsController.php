<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\Products\Create;
use App\Http\Requests\Products\Update;
use App\Repositories\ProductsRepository;
use App\Http\Requests\Index\Pagination;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    private $ProductsRepo;
    public function __construct(ProductsRepository $ProductsRepo)
    {
        $this->ProductsRepo = $ProductsRepo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pagination $request)
    {
        $request->validated();
        return $this->ProductsRepo->getList($request->take);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $Products = $request->validated();
        $response = $this->ProductsRepo->create($Products);
        return response()->json([
            'success' => true,
            'message' => 'Products created successfully',
            'data' => $response
        ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $Products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $Products
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $product = $request->validated();
        $this->ProductsRepo->update($id, $product);
        return response()->json([
            'success' => true,
            'message' => 'Products updated successfully',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $Products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $this->ProductsRepo->delete($product);
        return response()->json([
            'success' => true,
            'message' => 'Products deleted successfully',
        ], Response::HTTP_OK);
    }
}

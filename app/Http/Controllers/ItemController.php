<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreRequest;
use App\Http\Requests\Items\UpdateRequest;
use App\Http\Resources\Items\ItemsResource;
use App\Http\Resources\Player\PlayerResource;
use App\Models\Item;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class ItemController extends Controller
{




    /**
     * @OA\Tag(
     *     name="Items",
     *     description="Operations about items"
     * )
     */






    /**
     * @OA\Get(
     *     path="/api/player/items/{item}",
     *     summary="Get an item by ID",
     *     tags={"Items"},
     *     @OA\Parameter(
     *         name="item",
     *         in="path",
     *         description="Item ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Item not found")
     * )
     */


    public function show(Item $item)
    {
        return ItemsResource::make($item);
    }


    /**
     * @OA\Post(
     *     path="/api/player/items",
     *     summary="Create a new item",
     *     tags={"Items"},
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/Items")
     *     ),
     *     @OA\Response(response="200", description="Success")
     * )
     */



    public function store(StoreRequest $request)
    {
        return Item::create($request->validated());
    }

    /**
     * @OA\Delete(
     *     path="/api/player/items/{item}",
     *     summary="Delete an item by ID",
     *     tags={"Items"},
     *     @OA\Parameter(
     *         name="item",
     *         in="path",
     *         description="Item ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Item not found")
     * )
     */


    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json([
            'message' => 'done'
        ]);
    }

    /**
     * @OA\Schema(
     *     schema="Items",
     *     @OA\Property(property="player_id", type="integer", example=1),
     *     @OA\Property(property="item_id", type="integer", example=1)
     * )
     */
    public function index()
    {
        //
    }


}

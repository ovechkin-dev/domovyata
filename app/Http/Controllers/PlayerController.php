<?php

namespace App\Http\Controllers;

use App\Http\Requests\Player\StoreRequest;
use App\Http\Requests\Player\UpdateRequest;
use App\Http\Resources\Player\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @OA\Info(
 *     title="Домовята API",
 *     version="1.0.0",
 *     description="Swagger OpenApi"
 * ),
 * @OA\PathItem(
 *     path="/api"
 * )
 *
 */

class PlayerController extends Controller
{

    /**
     * @OA\Tag(
     *     name="Player",
     *     description="Operations about players"
     * )
     */

    /**
     * @OA\Schema(
     *     schema="Player",
     *     @OA\Property(property="energy", type="integer", example=20),
     *     @OA\Property(property="position_x", type="string", example=0),
     *     @OA\Property(property="room_position_x", type="integer", example=0)
     * )
     */


    public function index()
    {
    //    $players = Player::all();
     //   return PlayerResource::collection($players);
    }

    /**
     * @OA\Post(
     *     path="/api/player",
     *     summary="Create a new player",
     *     tags={"Player"},
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/Player")
     *     ),
     *     @OA\Response(response="200", description="Success")
     * )
     */
    public function store(StoreRequest $request)
    {
        return Player::create($request->validated());
    }

    /**
     * @OA\Get(
     *     path="/api/player/{player}",
     *     summary="Get a player by ID",
     *     tags={"Player"},
     *     @OA\Parameter(
     *         name="player",
     *         in="path",
     *         description="Player ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Player not found")
     * )
     */

    public function show(Player $player)
    {
        return PlayerResource::make($player);
    }

    /**
     * @OA\Put(
     *     path="/api/player/{player}",
     *     summary="Update a player by ID",
     *     tags={"Player"},
     *     @OA\Parameter(
     *         name="player",
     *         in="path",
     *         description="Player ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/Player")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Player not found")
     * )
     */
    public function update(UpdateRequest $request, Player $player)
    {
        $data = $request->validated();
        $player->update($data);
        $player = $player->fresh();
        return PlayerResource::make($player);
    }

    /**
     * @OA\Delete(
     *     path="/api/player/{player}",
     *     summary="Delete a player by ID",
     *     tags={"Player"},
     *     @OA\Parameter(
     *         name="player",
     *         in="path",
     *         description="Player ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Player not found")
     * )
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json([
            'message' => 'done'
        ]);
    }
    /**
     * @OA\Get(
     *     path="/api/players/{player}/items",
     *     summary="Get items of a player by ID",
     *     tags={"Items"},
     *     @OA\Parameter(
     *         name="player",
     *         in="path",
     *         description="Player ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Player not found")
     * )
     */
    public function items_get($id)
    {
        return Player::find($id)->items;
    }

}

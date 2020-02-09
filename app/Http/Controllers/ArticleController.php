<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 * author i.rebega@iriscrm.com
 */
class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/articles",
     *     tags={"articles"},
     *     summary="List of all articles",
     *     description="List of all articles",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Article")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status"
     *     )
     * )
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * @OA\Get(
     *     path="/articles/{id}",
     *     tags={"articles"},
     *     summary="Article",
     *     description="Info about article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="article id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Article"),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Article was not found"
     *     )
     * )
     */
    public function show($id)
    {
        return Article::findOrFail($id);
    }

    /**
     * @OA\Post(
     *     path="/articles",
     *     tags={"articles"},
     *     summary="Create article",
     *     security={"passport"},
     *     @OA\Response(
     *         response=200,
     *         description="Article data"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ArticleRequest")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();

        return Article::create($data);
    }

    /**
     * @OA\Put(
     *     path="/articles/{id}",
     *     tags={"articles"},
     *     summary="Update article",
     *     security={"passport"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="article id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article data"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="title",
     *                     description="Article title",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="body",
     *                     description="Article text",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $article = Article::findOrFail($id);
        $article->update($data);

        return $article;
    }

    /**
     * @OA\Delete(
     *     path="/articles/{id}",
     *     tags={"articles"},
     *     summary="Remove article",
     *     security={"passport"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="article id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Removed successfully"
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     )
     * )
     */
    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return ['success' => 1];
    }
}

<?php

/**
 * Class Article
 * author i.rebega@iriscrm.com
 *
 * @OA\Schema(
 *     description="Edit/Create Article"
 * )
 */
class ArticleRequest
{
    /**
     * @OA\Property(type="string")
     */
    public $title;

    /**
     * @OA\Property(type="string", nullable=true)
     */
    public $body;
}

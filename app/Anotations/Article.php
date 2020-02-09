<?php

/**
 * Class Article
 * author i.rebega@iriscrm.com
 *
 * @OA\Schema()
 */
class Article
{
    /**
     * @OA\Property(type="integer")
     */
    public $id;

    /**
     * @OA\Property(type="string")
     */
    public $title;

    /**
     * @OA\Property(type="string",nullable=true)
     */
    public $body;

    /**
     * @OA\Property(type="integer")
     */
    public $user_id;
}

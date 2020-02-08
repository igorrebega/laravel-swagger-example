<?php

namespace App\Annotations;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Pet API",
 *      description="Pet API example",
 *      @OA\Contact(
 *          email="igorrebega@gmail.com"
 *      )
 * )
 */

/**
 *  @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Host"
 *  )
 */

/**
 * @SWG\Post(
 *      path="/oauth/token",
 *      summary="Requests a access token",
 *      tags={"OAuth"},
 *      operationId="refreshToken",
 *      consumes={"application/x-www-form-urlencoded"},
 *      @SWG\Parameter(
 *          name="grant_type",
 *          in="formData",
 *          description="refresh_token or password",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="client_id",
 *          in="formData",
 *          description="OAuth Client ID",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="client_secret",
 *          in="formData",
 *          description="OAuth Client Secret",
 *          required=true,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="username",
 *          in="formData",
 *          description="User`s email  (if grant_type = password)",
 *          required=false,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="password",
 *          in="formData",
 *          description="Password for the user (if grant_type = password)",
 *          required=false,
 *          type="string"
 *      ),
 *      @SWG\Parameter(
 *          name="refresh_token",
 *          in="formData",
 *          description="Refresh toke (if grant_type = refresh_token)",
 *          required=false,
 *          type="string"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema(ref="#/definitions/Token"),
 *      ),
 *      @SWG\Response(
 *          response=400,
 *          description="user is not activated or user is not admin",
 *      )
 *  )
 */

/**
 * @SWG\Get(
 *      path="/oauth/tokens",
 *      summary="Returns all client's tokens for authenticated user",
 *      tags={"OAuth"},
 *      operationId="getTokens",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *          @SWG\Schema(
 *              type="array",
 *              @SWG\Items(ref="#/definitions/Token")
 *          )
 *      )
 *  )
 */

/**
 * @SWG\Delete(
 *      path="/oauth/token/{token_id}",
 *      summary="Deny the token",
 *      tags={"OAuth"},
 *      operationId="denyToken",
 *      @SWG\Parameter(
 *          name="token_id",
 *          in="path",
 *          description="",
 *          required=true,
 *          type="integer"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation",
 *      )
 *  )
 */

/**
 * @OA\Get(
 *      path="/projects/{id}",
 *      operationId="getProjectById",
 *      tags={"Projects"},
 *      summary="Get project information",
 *      description="Returns project data",
 *      @OA\Parameter(
 *          name="id",
 *          description="Project id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "oauth2_security_example": {"write:projects", "read:projects"}
 *         }
 *     },
 * )
 */

<?php
declare(strict_types=1);

namespace jobiq\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

/**
 * Class HelloWorld
 */
class HelloWorld
{
    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        return $response->write('Hello World')->withStatus(StatusCode::HTTP_OK);
    }
}
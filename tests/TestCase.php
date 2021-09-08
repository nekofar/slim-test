<?php

declare(strict_types=1);

namespace Tests;

use DI\Container;
use Fig\Http\Message\StatusCodeInterface as StatusCode;
use Nekofar\Slim\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

abstract class TestCase extends BaseTestCase
{
    use AppTestTrait;

    final protected function setUp(): void
    {
        parent::setUp();

        // Create Container using PHP-DI
        $container = new Container();

        // Configure the application via container
        $app = AppFactory::createFromContainer($container);

        // Add Routing Middleware
        $app->addRoutingMiddleware();

        // Add Error Middleware
        $app->addErrorMiddleware(false, false, false);

        $this->setUpApp($app);

        $this->setUpRoutes();
    }

    final protected function setUpRoutes(): void
    {
        $this->app->any('/text', function (Request $request, Response $response): Response {
            $response->getBody()->write('hello, world');

            return $response;
        });

        $this->app->any('/json', function (Request $request, Response $response): Response {
            $response->getBody()->write('{"hello":"world"}');

            return $response;
        });

        $this->app->get('/token', function (Request $request, Response $response): Response {
            return $response
                ->withHeader('Authorization', $request->getHeader('Authorization'))
                ->withStatus(StatusCode::STATUS_OK);
        });

        $this->app->get('/header', function (Request $request, Response $response): Response {
            return $response
                ->withHeader('X-Test', $request->getHeader('X-Test'))
                ->withStatus(StatusCode::STATUS_OK);
        });

        $this->app->post('/created', function (Request $request, Response $response): Response {
            return $response->withStatus(StatusCode::STATUS_CREATED);
        });

        $this->app->post('/forbidden', function (Request $request, Response $response): Response {
            return $response->withStatus(StatusCode::STATUS_FORBIDDEN);
        });

        $this->app->post('/unauthorized', function (Request $request, Response $response): Response {
            return $response->withStatus(StatusCode::STATUS_UNAUTHORIZED);
        });

        $this->app->post('/unprocessable', function (Request $request, Response $response): Response {
            return $response->withStatus(StatusCode::STATUS_UNPROCESSABLE_ENTITY);
        });
    }
}

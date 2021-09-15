<?php

declare(strict_types=1);

namespace Tests;

use DI\Bridge\Slim\Bridge;
use DI\Container;
use Nekofar\Slim\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class TestCase extends BaseTestCase
{
    use AppTestTrait;

    /**
     * Setup test environment.
     */
    final protected function setUp(): void
    {
        parent::setUp();

        // Create Container using PHP-DI
        $container = new Container();

        // Configure the application via container
        $this->setUpApp(Bridge::create($container));

        // Setup requires routes and middlewares for testing
        $this->setUpRoutes();
        $this->setUpMiddlewares();
    }

    /**
     * Setup routes for Slim app.
     */
    final protected function setUpRoutes(): void
    {
        $this->app->any('/status/{code}', function (Response $response, int $code): Response {
            return $response->withStatus($code);
        });

        $this->app->any('/text/{type}', function (Response $response, string $type): Response {
            if ('plain' === $type) {
                $response->getBody()->write('hello, world');
            } elseif ('html' === $type) {
                $response->getBody()->write('<p>hello, <i>world</i></p>');
            }

            return $response;
        });

        $this->app->any('/json/{type}', function (Response $response, string $type): Response {
            if ('one' === $type) {
                $response->getBody()->write('{"hello":"world"}');
            } elseif ('two' === $type) {
                $response->getBody()->write('{"foo":"bar","baz":"qux"}');
            } elseif ('third' === $type) {
                $response->getBody()->write('[{"foo":"bar","baz":"qux"}]');
            }

            return $response;
        });

        $this->app->get('/head/{type}', function (Request $request, Response $response, string $type): Response {
            if ('test' === $type) {
                $response = $response->withHeader('X-Test', $request->getHeader('X-Test'));
            } elseif ('auth' === $type) {
                $response = $response->withHeader('Authorization', $request->getHeader('Authorization'));
            }

            return $response;
        });
    }

    /**
     * Setup middlewares for Slim app.
     */
    final protected function setUpMiddlewares(): void
    {
        // Add Routing Middleware
        $this->app->addRoutingMiddleware();

        // Add Error Middleware
        $this->app->addErrorMiddleware(false, false, false);
    }
}

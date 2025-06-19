<?php
declare(strict_types=1);

namespace jobiq\ServiceProvider;

use jobiq\Action\MatchJobs;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\App;
use jobiq\Action\HelloWorld;

/**
 * A ServiceProvider for registering services related
 * to Slim such as request handlers, routing and the
 * App service itself.
 */
class AppProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container): void
    {
        /** Initialize App */
        $container[App::class] = function (Container $container): App {
            $app = new App($container);

            /** Configure CORS */
            $app->options('/{routes:.+}', function ($request, $response, $args) {
                return $response;
            });
            $app->add(function ($req, $res, $next) {
                $response = $next($req, $res);
                return $response
                    ->withHeader('Access-Control-Allow-Origin', '*')
                    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            });

            /** Register Endpoints */
            $app->get('/hello-world', HelloWorld::class)->setName('hello-world');
            $app->get('/match-jobs', MatchJobs::class)->setName('match-jobs');

            return $app;
        };
    }
}
<?php
declare(strict_types=1);

namespace jobiq\ServiceProvider;

use jobiq\Action\HelloWorld;
use jobiq\Action\MatchJobs;
use jobiq\Domain\Factory\ClientFactory;
use jobiq\Domain\Factory\ListingFactory;
use jobiq\Domain\Factory\ReaderFactory;
use jobiq\Domain\Service\Analyzer;
use jobiq\Domain\Service\IndeedClient;
use jobiq\Domain\Service\LinkedInClient;
use jobiq\Domain\Service\PdfReader;
use jobiq\Domain\Service\WordReader;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * A ServiceProvider for registering services in a DI container.
 */
class DependencyProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container): void
    {
        /**
         * FACTORIES
         */
        $container[ClientFactory::class] = function (Container $container): ClientFactory {
            return new ClientFactory($container);
        };

        $container[ListingFactory::class] = function (Container $container): ListingFactory {
            return new ListingFactory($container);
        };

        $container[ReaderFactory::class] = function (Container $container): ReaderFactory {
            return new ReaderFactory($container);
        };

        /**
         * SERVICES
         */
        $container[LinkedInClient::class] = function (Container $container): LinkedInClient {
            return new LinkedInClient($container['logger']);
        };

        $container[IndeedClient::class] = function (Container $container): IndeedClient {
            return new IndeedClient($container['logger']);
        };

        $container[PdfReader::class] = function (Container $container): PdfReader {
            return new PdfReader($container['logger']);
        };

        $container[WordReader::class] = function (Container $container): WordReader {
            return new WordReader($container['logger']);
        };

        $container[Analyzer::class] = function (Container $container): Analyzer {
            return new Analyzer($container['logger']);
        };

        /**
         * ACTIONS
         */
        $container[HelloWorld::class] = function (Container $container): HelloWorld {
            return new HelloWorld($container);
        };

        $container[MatchJobs::class] = function (Container $container): MatchJobs {
            return new MatchJobs($container);
        };
    }
}
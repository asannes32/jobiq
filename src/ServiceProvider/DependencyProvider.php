<?php
declare(strict_types=1);

namespace jobiq\ServiceProvider;

use jobiq\Action\HelloWorld;
use jobiq\Action\MatchJobs;
use jobiq\Domain\Factory\ClientFactory;
use jobiq\Domain\Factory\ListingFactory;
use jobiq\Domain\Factory\ParserFactory;
use jobiq\Domain\Factory\ResumeFactory;
use jobiq\Domain\Service\Analyzer;
use jobiq\Domain\Service\IndeedClient;
use jobiq\Domain\Service\JobFinder;
use jobiq\Domain\Service\LinkedInClient;
use jobiq\Domain\Service\PdfParser;
use jobiq\Domain\Service\WordParser;
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

        $container[ParserFactory::class] = function (Container $container): ParserFactory {
            return new ParserFactory($container);
        };

        $container[ResumeFactory::class] = function (Container $container): ResumeFactory {
            return new ResumeFactory($container);
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

        $container[PdfParser::class] = function (Container $container): PdfParser {
            return new PdfParser($container['logger']);
        };

        $container[WordParser::class] = function (Container $container): WordParser {
            return new WordParser($container['logger']);
        };

        $container[Analyzer::class] = function (Container $container): Analyzer {
            return new Analyzer($container['logger']);
        };

        $container[JobFinder::class] = function (Container $container): JobFinder {
            return new JobFinder($container);
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
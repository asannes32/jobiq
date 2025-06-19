<?php
declare(strict_types=1);

namespace jobiq\Action;

use jobiq\Domain\Factory\ClientFactory;
use jobiq\Domain\Factory\ReaderFactory;
use jobiq\Domain\Interface\Client;
use jobiq\Domain\Service\Analyzer;
use jobiq\Domain\Service\IndeedClient;
use jobiq\Domain\Service\LinkedInClient;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

/**
 * Class MatchJobs
 */
class MatchJobs
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        // parse
        $details = $this->container->get(ReaderFactory::class)
            ->create(['path' => 'path/to/file.pdf'])
            ->readFile();

        // search
        $listings = array_merge(
            $this->container->get(ClientFactory::class)->create(['jobBoard' => 'LinkedIn'])->getListings($details['keywords']),
            $this->container->get(ClientFactory::class)->create(['jobBoard' => 'Indeed'])->getListings($details['keywords'])
        );

        // score
        $results = $this->container->get(Analyzer::class)
            ->score($listings, $details);

        return $response->withJson($results)->withStatus(StatusCode::HTTP_OK);
    }
}
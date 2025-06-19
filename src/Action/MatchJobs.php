<?php
declare(strict_types=1);

namespace jobiq\Action;

use jobiq\Domain\Factory\ClientFactory;
use jobiq\Domain\Factory\ResumeFactory;
use jobiq\Domain\Service\Analyzer;
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
        $resume = $this->container->get(ResumeFactory::class)->create(['path' => 'path/to/file.pdf']);

        // search
        // todo - my brain says there's a better way to do this, but I haven't identified the right solution yet. It doesn't conform to OCP.
        $listings = array_merge(
            $this->container->get(ClientFactory::class)->create(['source' => 'LinkedIn'])->getListings($resume->getskills()),
            $this->container->get(ClientFactory::class)->create(['source' => 'Indeed'])->getListings($resume->getskills())
        );

        // score
        $results = $this->container->get(Analyzer::class)
            ->score($listings, $resume);

        return $response->withJson($results)->withStatus(StatusCode::HTTP_OK);
    }
}
<?php
declare(strict_types=1);

namespace jobiq\Action;

use jobiq\Domain\Factory\ClientFactory;
use jobiq\Domain\Factory\ResumeFactory;
use jobiq\Domain\Interface\Listing;
use jobiq\Domain\Model\Resume;
use jobiq\Domain\Service\Analyzer;
use jobiq\Domain\Service\JobFinder;
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
        /** @var Resume $resume */
        $resume = $this->container->get(ResumeFactory::class)
            ->create(['path' => 'path/to/file.pdf']);

        /** @var Listing[] $listings */
        $listings = $this->container->get(JobFinder::class)
            ->search($resume->getSkills());

        /** @var array $results */
        $results = $this->container->get(Analyzer::class)
            ->score($listings, $resume);

        return $response->withJson($results)->withStatus(StatusCode::HTTP_OK);
    }
}
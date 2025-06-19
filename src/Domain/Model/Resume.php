<?php
namespace jobiq\Domain\Model;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Trait\Loggable;
use Monolog\Logger;

class Resume implements Entity
{
    use Loggable;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var array
     */
    protected array $location;

    /**
     * @var array
     */
    protected array $skills;

    /**
     * @var array
     */
    protected array $experience;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    /**
     * @param array $details
     * @return $this
     */
    public function initialize(array $details): static
    {
        $this->name = $details['name'];
        $this->location = $details['location'];
        $this->skills = $details['skills'];
        $this->experience = $details['experience'];

        return $this;
    }

    /**
     * @return array
     */
    public function getDetails(): array
    {
        return [
            'name' => $this->name,
            'location' => $this->location,
            'skills' => $this->skills,
            'experience' => $this->experience
        ];
    }
}
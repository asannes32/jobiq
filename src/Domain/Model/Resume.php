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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Resume
     */
    public function setName(string $name): Resume
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getLocation(): array
    {
        return $this->location;
    }

    /**
     * @param array $location
     * @return Resume
     */
    public function setLocation(array $location): Resume
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @param array $skills
     * @return Resume
     */
    public function setSkills(array $skills): Resume
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return array
     */
    public function getExperience(): array
    {
        return $this->experience;
    }

    /**
     * @param array $experience
     * @return Resume
     */
    public function setExperience(array $experience): Resume
    {
        $this->experience = $experience;
        return $this;
    }
}
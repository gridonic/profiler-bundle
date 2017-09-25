<?php

namespace Gridonic\ProfilerBundle\Service;


use DateTime;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LogService
{
    /** @var DateTime */
    private $currentRequestTimestamp;

    /** @var ContainerInterface */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Logs in only if trace mode is enabled
     *
     * @param string $message
     */
    public function trace($message)
    {
        if (!$this->container->getParameter('trace_log_enabled')) {
            return;
        }

        $this->container->get('monolog.logger')->debug(
            $message,
            array('request_timestamp' => $this->getCurrentRequestTimestamp())
        );
    }

    /**
     * @return int
     */
    public function getCurrentRequestTimestamp(): int
    {
        if ($this->currentRequestTimestamp === null) {
            $this->currentRequestTimestamp = new DateTime();
        }

        return $this->currentRequestTimestamp->getTimestamp();
    }

}

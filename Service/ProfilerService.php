<?php

namespace Gridonic\ProfilerBundle\Service;


class ProfilerService
{
    private $startTimes = array();
    private $TEMP_data = array();

    /** @var LogService */
    private $logService;

    /**
     * @param LogService $logService
     */
    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * @param string $action
     */
    public function startMeasure(string $action)
    {
        $this->logService->trace('Analyzer Start Measure: ' . $action);
        $this->setTimerStart($action);
    }

    /**
     * @param string $action
     * @param array $info
     */
    public function endMeasure(string $action, array $info = array())
    {
        $this->logService->trace('Analyzer End Measure: ' . $action);
        // TODO: where and how should we store the info? a simple database would be nice
        $this->TEMP_data[] = array(
            'action' => $action,
            'elapsed' => $this->getElapsedTime($action),
            'info' => $info,
        );
    }

    public function getData()
    {
        return $this->TEMP_data;
    }

    protected function setTimerStart($actionName)
    {
        $this->startTimes[$actionName] = microtime(true);
    }

    protected function getElapsedTime($actionName)
    {
        return microtime(true) - $this->startTimes[$actionName];
    }
}

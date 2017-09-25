<?php

namespace Gridonic\ProfilerBundle\Traits;

use Gridonic\ProfilerBundle\Service\ProfilerService;

class ProfilerTrait
{
    /** @var ProfilerService */
    private $profiler;

    /**
     * @return ProfilerService
     */
    public function getProfiler(): ProfilerService
    {
        return $this->profiler;
    }

    /**
     * @param ProfilerService $profiler
     */
    public function setProfiler(ProfilerService $profiler)
    {
        $this->profiler = $profiler;
    }

    /**
     * @param string $action
     */
    public function startMeasure(string $action)
    {
        $this->profiler->startMeasure($action);
    }

    /**
     * @param string $action
     * @param array $info
     */
    public function endMeasure(string $action, array $info = array())
    {
        $this->profiler->endMeasure($action, $info);
    }
}

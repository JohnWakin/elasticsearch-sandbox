<?php

/**
 * Class Robofile
 */
class Robofile extends \Robo\Tasks
{
    use \Codeception\Task\MergeReports;
    use \Codeception\Task\SplitTestsByGroups;

    public function parallelSplitTests()
    {

    }

    public function parallelRun()
    {
        $parallel = $this->taskParallelExec();
        $parallel->process(
            $this->taskCodecept()
            ->suite('unit')
            ->xml('tests/_log/unit.xml')
        );

        $parallel->process(
            $this->taskCodecept()
            ->suite('functional')
            ->xml('tests/_log/functional.xml')
        );

        $parallel->process(
            $this->taskCodecept()
            ->suite('acceptance')
            ->xml('tests/_log/acceptance.xml')
        );

        return $parallel->run();
    }

    public function parallelMergeResults()
    {
        $this->taskMergeXmlReports()
            ->from('tests/_output/tests/_log/unit.xml')
            ->from('tests/_output/tests/_log/functional.xml')
            ->from('tests/_output/tests/_log/acceptance.xml')
            ->into('tests/_output/tests/_log/result.xml')
            ->run();
    }

    function parallelAll()
    {
        $result = $this->parallelRun();
        $this->parallelMergeResults();

        return $result;
    }
}

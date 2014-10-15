<?php

/**
 * Class Robofile
 */
class Robofile extends \Robo\Tasks
{
    use \Codeception\Task\MergeReports;
    use \Codeception\Task\SplitTestsByGroups;

    /**
     * Used to split tests
     */
    public function parallelSplitTests()
    {

    }

    /**
     * @return \Robo\Result
     */
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

    /**
     * @throws \Robo\Task\Shared\TaskException
     */
    public function parallelMergeResults()
    {
        $this->taskMergeXmlReports()
            ->from('tests/_output/tests/_log/unit.xml')
            ->from('tests/_output/tests/_log/functional.xml')
            ->from('tests/_output/tests/_log/acceptance.xml')
            ->into('tests/_output/tests/_log/result.xml')
            ->run();
    }

    /**
     * @return \Robo\Result
     */
    function parallelAll()
    {
        $result = $this->parallelRun();
        $this->parallelMergeResults();

        return $result;
    }
}

[![Build Status](https://travis-ci.org/TransformCore/elasticsearch-sandbox.svg?branch=master)](https://travis-ci.org/TransformCore/elasticsearch-sandbox) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/TransformCore/elasticsearch-sandbox/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/TransformCore/elasticsearch-sandbox/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/TransformCore/elasticsearch-sandbox/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/TransformCore/elasticsearch-sandbox/?branch=master)

composer.lock [![Dependency Status](https://www.versioneye.com/user/projects/542e331ebeeeeefccb000138/badge.svg?style=flat)](https://www.versioneye.com/user/projects/542e331ebeeeeefccb000138)

composer.json [![Dependency Status](https://www.versioneye.com/user/projects/542e3319beeeee2af1000093/badge.svg?style=flat)](https://www.versioneye.com/user/projects/542e3319beeeee2af1000093)

# ElasticSearch Demo

**Note: This Application sleeps when not in use, therefore the first request after sleeping will be slower while it boots.**

URL: http://elasticsearch-sandbox.herokuapp.com/

This Demo allows one to run the Search Examples from https://github.com/TransformCore/elasticsearch-example-docs

## Screenshots

![Search All](docs/screenshots/search-all.png)
![Search Filter](docs/screenshots/search-filter.png)

## How to run a private instance of the Application

### Development

1. Clone project (Fork if wish to contribute back)
`git clone https://github.com/eddiejaoude/elasticsearch-sandbox.git`

2. Run composer
`php composer.phar install`

2. Run PHP Built-in Webserver
`ES_URL={ELASTIC-SEARCH-URL} ES_USERNAME={ELASTIC-SEARCH-USERNAME} ES_PASSWORD={ELASTIC-SEARCH-PASSWORD} php -d variables_order=EGPCS -S 0.0.0.0:8000 -t public/`

3. Load dummy data
`ES_URL={ELASTIC-SEARCH-URL} ES_USERNAME={ELASTIC-SEARCH-USERNAME} ES_PASSWORD={ELASTIC-SEARCH-PASSWORD} php public/index.php load data demo`

4. Then go to that port in your browser http://localhost:8000 & start playing

Note: Instead of putting the ENV variables infront of the comands, you can either set them as ENV variables in your system or the simplest method is to copy `elasticsearch.local.php.dist` to a file called `elasticsearch.local.php` and replace the variables.

`elasticsearch.local.php` type files (i.e. `*.local.php`) are ignored by Git, therefore this will never be tracked & committed to the repository.

Then use the following command to start the webserver:
`php -S 0.0.0.0:8000 -t public/`

> Example Searches with **Dummy Data** https://github.com/TransformCore/elasticsearch-example-docs

### How to run Test Suite

#### Standard testing suite command

```
vendor/bin/codecept run
```

Output:
```
$ vendor/bin/codecept run 
Codeception PHP Testing Framework v2.0.7
Powered by PHPUnit 4.3.1 by Sebastian Bergmann.

Acceptance Tests (0) ------------------------
---------------------------------------------

Functional Tests (0) ------------------------
---------------------------------------------

Unit Tests (11) ---------------------------------------------------------------------------------------------------------------------------------------
Trying to test create service (ApplicationTest\Factory\ElasticSearchClientTest::testCreateService)                                                Ok
Trying to test create service (ApplicationTest\Factory\ElasticSearchServiceTest::testCreateService)                                               Ok
Trying to test form (ApplicationTest\Form\SearchFormTest::testForm)                                                                               Ok
Trying to test instance (ApplicationTest\Model\Entity\SearchEntityTest::testInstance)                                                             Ok
Trying to test exchange array empty (ApplicationTest\Model\Entity\SearchEntityTest::testExchangeArrayEmpty)                                       Ok
Trying to test exchange array (ApplicationTest\Model\Entity\SearchEntityTest::testExchangeArray)                                                  Ok
Trying to test get input filter (ApplicationTest\Model\Entity\SearchEntityTest::testGetInputFilter)                                               Ok
Trying to test validation successful (ApplicationTest\Model\Entity\SearchEntityTest::testValidationSuccessful)                                    Ok
Trying to test validation failure (ApplicationTest\Model\Entity\SearchEntityTest::testValidationFailure)                                          Ok
Trying to test instance (ApplicationTest\Service\ElasticSearchTest::testInstance)                                                                 Ok
Trying to test search (ApplicationTest\Service\ElasticSearchTest::testSearch)                                                                     Ok
-------------------------------------------------------------------------------------------------------------------------------------------------------

ApplicationTest.acceptance Tests (2) ----------------------------------------------------------------------------------------------------------------------------------------------
Trying to ensure that the default Search Page works (SearchAllCept)                                                                                                           Ok
Trying to ensure that Search Page works (SearchCept)                                                                                                                          Ok
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

ApplicationTest.functional Tests (0) --------
---------------------------------------------

ApplicationTest.unit Tests (0) --------------
---------------------------------------------


[ApplicationTest]: tests from /Users/eddiejaoude/Development/github/elasticsearch-sandbox//module/Application



Time: 6.16 seconds, Memory: 27.00Mb

OK (13 tests, 43 assertions)
```


#### Run Test Suites in Parallel (Unit, Functional, Acceptance)

```
vendor/bin/robo parallel:all
```

Output:
```
$ vendor/bin/robo parallel:all
 [Robo\Task\ParallelExecTask] vendor/bin/codecept run --xml tests/_log/unit.xml unit
 [Robo\Task\ParallelExecTask] vendor/bin/codecept run --xml tests/_log/functional.xml functional
 [Robo\Task\ParallelExecTask] vendor/bin/codecept run --xml tests/_log/acceptance.xml acceptance
 [Robo\Task\ParallelExecTask] Processes: 3/3 [============================] 100%
 [Robo\Task\ParallelExecTask] 3 processes ended in 2.74 s
 [Codeception\Task\MergeXmlReportsTask] Merging JUnit XML reports into tests/_output/tests/_log/result.xml
 [Codeception\Task\MergeXmlReportsTask] Processing tests/_output/tests/_log/unit.xml
 [Codeception\Task\MergeXmlReportsTask] Processing tests/_output/tests/_log/functional.xml
 [Codeception\Task\MergeXmlReportsTask] Processing tests/_output/tests/_log/acceptance.xml
 [Codeception\Task\MergeXmlReportsTask] File tests/_output/tests/_log/result.xml saved. 2 suites added
```

### Codeception Test Results Screenshot

![Test Results](docs/screenshots/test-results.png)

## Screenshots

Travis CI

![Travis CI](docs/screenshots/travis-ci.png)

Scrutinizer Static Code Analysis

![Static Code Analysis](docs/screenshots/static-code-analysis.png)

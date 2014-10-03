[![Dependency Status](https://www.versioneye.com/user/projects/542e331ebeeeeefccb000138/badge.svg?style=flat)](https://www.versioneye.com/user/projects/542e331ebeeeeefccb000138)

# ElasticSearch Demo

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
`BONSAI_URL={ELASTIC-SEARCH-URL} BONSAI_USERNAME={ELASTIC-SEARCH-USERNAME} BONSAI_PASSWORD={ELASTIC-SEARCH-PASSWORD} php -d variables_order=EGPCS -S 0.0.0.0:8000 -t public/`

3. Load dummy data
`php public/index.php load data demo`

3. Then go to that port in your browser http://localhost:8000 & start playing

Example Searches with **Dummy Data** https://github.com/TransformCore/elasticsearch-example-docs

### How to run Test Suite

`vendor/bin/codecept run`

Output:
```
vendor/bin/codecept run
Codeception PHP Testing Framework v2.0.5
Powered by PHPUnit 4.2.6 by Sebastian Bergmann.

Acceptance Tests (0) ------------------------
---------------------------------------------

Functional Tests (0) ------------------------
---------------------------------------------

Unit Tests (10) ---------------------------------------------------------------------------------------------------------------------------------------
Trying to test create service (ApplicationTest\Factory\ElasticSearchClientTest::testCreateService)                                                Ok
Trying to test create service (ApplicationTest\Factory\ElasticSearchServiceTest::testCreateService)                                               Ok
Trying to test form (ApplicationTest\Form\SearchFormTest::testForm)                                                                               Ok
Trying to test instance (ApplicationTest\Model\Entity\SearchEntityTest::testInstance)                                                             Ok
Trying to test exchange array empty (ApplicationTest\Model\Entity\SearchEntityTest::testExchangeArrayEmpty)                                       Ok
Trying to test exchange array (ApplicationTest\Model\Entity\SearchEntityTest::testExchangeArray)                                                  Ok
Trying to test get input filter (ApplicationTest\Model\Entity\SearchEntityTest::testGetInputFilter)                                               Ok
Trying to test validation (ApplicationTest\Model\Entity\SearchEntityTest::testValidation)                                                         Ok
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



Time: 1.66 seconds, Memory: 26.00Mb

OK (12 tests, 36 assertions)
```

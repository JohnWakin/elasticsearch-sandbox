# ElasticSearch Demo

This Demo allows one to run the Search examples from https://github.com/TransformCore/elasticsearch-example-docs

## How to run Application

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

## How to run Test Suite

`vendor/bin/codecept run`

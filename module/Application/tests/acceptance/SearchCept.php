<?php
namespace ApplicationTest;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that Search Page works');
$I->amOnPage('/');
$I->see('demo');
$I->see('Query body (json)');
$I->dontSee('Response');
$I->fillField('query', '
{
    "query" : {
        "filtered" : {
            "filter" : {
                "bool" : {
                    "should" : [
                         {
                            "bool": {
                                "must": [
                                    {
                                        "terms": {
                                            "group": ["alpha", "beta"]
                                        }
                                    },
                                    {
                                        "term": {
                                            "age": 20
                                        }
                                    }
                                ]
                            }
                         }
                    ]
                }
            }
        }
    },
    "sort": {
        "registered": {
            "order": "desc"
        }
    },
    "size": 5
}'
);
$I->click('submitbutton');
$I->see('Response');
$I->see('[total] => 2');

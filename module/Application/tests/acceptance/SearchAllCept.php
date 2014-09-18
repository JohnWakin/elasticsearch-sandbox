<?php
namespace ApplicationTest;

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that the default Search Page works');
$I->amOnPage('/');
$I->see('Index');
$I->see('Query body (json)');
$I->dontSee('Response');
$I->click('#submitbutton');
$I->see('Response');
$I->see('[total] => 5');

$I->click('#resetbutton');
$I->amOnPage('/');
$I->see('Index');
$I->see('Query body (json)');
$I->dontSee('Response');

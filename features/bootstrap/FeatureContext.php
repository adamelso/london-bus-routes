<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\RawMinkContext;

class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
}

<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
        /**
     * @Given there is a(n) :arg1, which costs £:arg2
     */
    public function thereIsAWhichCostsPs($arg1, $arg2)
    {
        throw new PendingException();
    }
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
        // Given there is a "Sith Lord Lightsaber", which costs £5
    $context->thereIsAWhichCostsPs('Sith Lord Lightsaber', '5');

    // Then there is a 'Jedi Lightsaber', which costs £10
    $context->thereIsAWhichCostsPs('Jedi Lightsaber', '10');

    // But there is a Lightsaber, which costs £25
    $context->thereIsAWhichCostsPs('Lightsaber', '25');
}

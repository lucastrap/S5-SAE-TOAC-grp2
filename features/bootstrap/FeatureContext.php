<?php

use Behat\Behat\Context\Context;

class FeatureContext implements Context
{
    private $products = [];

    /**
     * @Given there is a :arg1, which costs £:arg2
     */
    public function thereIsAWhichCostsPs($arg1, $arg2)
    {
        // Stocke les informations sur le produit dans un tableau
        $this->products[$arg1] = ['name' => $arg1, 'price' => $arg2];
    }

    /**
     * Initializes context.
     */
    public function __construct()
    {
        // Initialisation de votre contexte, si nécessaire.
    }

    /**
     * @Then I should have :count product(s)
     */
    public function iShouldHaveProducts($count)
    {
        // Vérifie le nombre de produits dans le tableau
        if (count($this->products) != $count) {
            throw new \Exception("Expected $count products, but got " . count($this->products));
        }
    }
}

// Exemple d'utilisation:

// Créez une instance de votre contexte
$context = new FeatureContext();

// Appelez votre méthode avec des exemples
$context->thereIsAWhichCostsPs('Sith Lord Lightsaber', '5');
$context->thereIsAWhichCostsPs('Jedi Lightsaber', '10');
$context->thereIsAWhichCostsPs('Lightsaber', '25');

// Vérifiez le nombre de produits
$context->iShouldHaveProducts(3);

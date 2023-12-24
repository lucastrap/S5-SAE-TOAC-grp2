Feature: Shopping for Lightsabers

  Scenario: Buying lightsabers
    Given there is a "Sith Lord Lightsaber", which costs £5
    And there is a "Jedi Lightsaber", which costs £10
    And there is a "Lightsaber", which costs £25

    When I buy the "Sith Lord Lightsaber"
    Then I should have 2 products
    And the total cost should be £35

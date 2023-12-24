# features/authentication/login.feature
Feature: Login Functionality
  In order to access my account
  As a user
  I want to log in with valid or invalid credentials

  Scenario: Successful Login
    Given I am on the login page
    When I log in with username "admin" and password "TOAC*MUST_CHANGE!"
    Then I should be redirected to the dashboard

  Scenario: Invalid Login
    Given I am on the login page
    When I log in with username "anonymous" and password "wrong_answer"
    Then I should stay on the same site

  Scenario: Adding an event
    Given I am in the administration panel, in the event tab to add an event
    Then I can fill the fields and submit them

  Scenario: Adding a post
    Given I am in the post management panel
    Then I can give a title "Race of the day", the content "Best race ever held" and submit it

  Scenario: Log out
    Given I am in the administration panel
    When I log out
    Then I have to log in again

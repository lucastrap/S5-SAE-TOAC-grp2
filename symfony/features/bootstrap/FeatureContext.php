<?php

use App\Entity\Evenement;
use Doctrine\DBAL\Types\Types;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use App\Repository\CourseRepository;
use Behat\Gherkin\Node\PyStringNode;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Behat\Tester\Exception\PendingException;


/**
 * Defines application features from the specific context.
 */

class FeatureContext implements Context
{
    private $httpClient;
    private $response;
    private $em;
    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    /**
     * @Given I am on the login page
     */
    public function iAmOnTheLoginPage()
    {
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/login');
    }

    /**
     * @When I log in with username :arg1 and password :arg2
     */
    public function iLogInWithUsernameAndPassword($arg1, $arg2)
    {
        $this->response = $this->httpClient->request('POST', 'http://localhost:3000/login', [
            'body' => [
                '_username' => $arg1,
                '_password' => $arg2,
            ],
        ]);
    }

    /**
     * @Then I should be redirected to the dashboard
     */
    public function iShouldBeRedirectedToTheDashboard()
    {
        $this->response = $this->httpClient->request('GET','http://localhost:3000/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CPostCrudController');
        $statusCode = $this->response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            echo "Login successful.";
        } else {
            echo "Login failed. Unexpected status code: $statusCode";
        }
    }

    /**
     * @Then I should stay on the same site
     */
    public function iShouldStayOnTheSameSite()
    {
        $expectedUrl = 'http://localhost:3000/login'; 

        $currentUrl = $this->response->getInfo('url');

        if ($currentUrl !== $expectedUrl) {
            throw new \Exception('Expected redirect to the login page not found.');
        }
    }


    /**
     * @Given I am in the administration panel, in the event tab to add an event
     */
    public function iAmInTheAdministrationPanelInTheEventTabToAddAnEvent()
    {
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CEvenementCrudController');
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/admin?crudAction=new&crudControllerFqcn=App%5CController%5CAdmin%5CEvenementCrudController&referrer=http://localhost:3000/admin?crudAction%3Dindex%26crudControllerFqcn%3DApp%255CController%255CAdmin%255CEvenementCrudController');
    }

    /**
     * @Then I can fill the fields and submit them
     */
    public function iCanFillTheFieldsAndSubmitThem()
    {
        $this->response = $this->httpClient->request('POST', 'http://localhost:3000/admin?crudAction=new&crudControllerFqcn=App%5CController%5CAdmin%5CEvenementCrudController&referrer=http://localhost:3000/admin?crudAction%3Dindex%26crudControllerFqcn%3DApp%255CController%255CAdmin%255CEvenementCrudController', [
            'body' => [
                'toDate' => '2023-12-31',
                'Title' => 'New Year Party',
                'Start' => '19:00',
            ],
        ]);
    }


    /**
     * @Given I am in the post management panel
     */
    public function iAmInThePostManagementPanel()
    {
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CPostCrudController');
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/admin?crudAction=new&crudControllerFqcn=App%5CController%5CAdmin%5CPostCrudController&referrer=http://localhost:3000/admin?crudAction%3Dindex%26crudControllerFqcn%3DApp%255CController%255CAdmin%255CPostCrudController');
    
    }

    /**
     * @Then I can give a title :arg1, the content :arg2 and submit it
     */
    public function iCanGiveATitleTheContentAndSubmitIt($arg1, $arg2)
    {
        $this->response = $this->httpClient->request('POST', 'http://localhost:3000/admin?crudAction=new&crudControllerFqcn=App%5CController%5CAdmin%5CPostCrudController&referrer=http://localhost:3000/admin?crudAction%3Dindex%26crudControllerFqcn%3DApp%255CController%255CAdmin%255CPostCrudController', [
            'body' => [
                'title' => $arg1,
                'content' => $arg2,
            ],
        ]);
    }

    /**
     * @Given I am in the administration panel
     */
    public function iAmInTheAdministrationPanel()
    {
        $this->response = $this->httpClient->request('POST', 'http://localhost:3000/login', [
            'body' => [
                'title' => "admin",
                'content' => "TOAC*MUST_CHANGE!",
            ],
        ]);
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/admin?crudAction=index&crudControllerFqcn=App%5CController%5CAdmin%5CPostCrudController');
    }

    /**
     * @When I log out
     */
    public function iLogOut()
    {
        $this->response = $this->httpClient->request('GET', 'http://localhost:3000/logout');
    }

    /**
     * @Then I have to log in again
     */
    public function iHaveToLogInAgain()
    {
        // On ne peux pas se acceder au dashboard sans
        $this->response = $this->httpClient->request('GET','http://localhost:3000/admin');
        $statusCode = $this->response->getStatusCode();
        $url = $this->response->getInfo('url');
        $expectedUrl = 'http://localhost:3000/login';
        if ($url === $expectedUrl) {
            echo "Logout successfully.";
        } else {
            throw new \RuntimeException("Logout function failed. Expected URL: $expectedUrl, Actual URL: $url");
        }
    }
}

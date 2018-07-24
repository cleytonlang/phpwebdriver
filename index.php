<?php
// An example of using php-webdriver.
// Do not forget to run composer install before and also have Selenium server started and listening on port 4444.

namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

@set_time_limit(0);
ini_set('max_execution_time','0');       

require_once('vendor/autoload.php');
// start Chrome with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default

$driver = RemoteWebDriver::create($host, DesiredCapabilities::firefox());

$driver->get('https://www.instagram.com/accounts/login/');

$driver->wait()->until(
    function () use ($driver) {
        return $driver->findElement(
                WebDriverBy::name('username')
        )->sendKeys('cleytonbrasiloficial');
    },
    'Error locating more than five elements'
);

$driver->wait()->until(
    function () use ($driver) {
        return  $driver->findElement(
                WebDriverBy::name('password')
            )->sendKeys('senhaaqui'); 
    },
    'Error locating more than five elements'
);

$driver->wait()->until(
    function () use ($driver) {
        return  $driver->findElement(
                WebDriverBy::cssSelector('form button')
            )->click();
    },
    'Error locating more than five elements'
);

$driver->wait()->until(
    function () use ($driver) {
        return  $driver->findElement(
                WebDriverBy::cssSelector('input[placeholder="Busca"]')
            )->sendKeys('#vilamix');
    },
    'Error locating more than five elements'
);


// $driver->quit();
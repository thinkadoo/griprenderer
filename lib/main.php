<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/21
 * Time: 9:54 PM
 * To change this template use File | Settings | File Templates.
 */

require_once('lib/greeting.php');

class Main
{
    private $greeting;

    function __construct(){
        $this->greeting = new Greeting();
    }

    public function sayHello(){
        $messageHello = $this->greeting->sayHelloHTML();
        echo $messageHello;
    }

    public function sayGoodbye(){
        $messageGoodbye = $this->greeting->sayGoodbyeHTML();
        echo $messageGoodbye;
    }

    public function getVars(){
        $messageHello = $this->greeting->sayHello();
        $messageGoodbye = $this->greeting->sayGoodbye();
        return array('hello' => $messageHello, 'bye' => $messageGoodbye);
    }

}

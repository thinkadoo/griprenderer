<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/21
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */

class Greeting
{

    function __construct(){

    }

    public function sayHello(){
        return "hello ya all";
    }

    public function sayGoodbye(){
        return "bye bye bye";
    }

    public function sayHelloHTML(){
        return "<p>hello ya all</p>";
    }

    public function sayGoodbyeHTML(){
        return "<p>bye bye bye</p>";
    }

}

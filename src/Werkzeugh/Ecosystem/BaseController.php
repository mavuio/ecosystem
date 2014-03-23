<?php

namespace Werkzeugh\Ecosystem;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{

    public function __construct(\Werkzeugh\Ecosystem\ControllerExtensionInterface $controllerExtension)
    {

        $this->eco=$controllerExtension;
        $this->eco->registerController($this);
    }

    // silverstripe-like-controller-init function, called in callAction, before the actual action is called

    public function init()
    {
      //initialize ecosystem
        $this->eco->init();
        $this->setDefaultLayoutTemplate();
        $this->setupDefaultViewVariables();
    }

    public function setupDefaultViewVariables()
    {

        \View::share('pageclass',$this->getCssClassName());

    }

    public function getCssClassName()
    {
         $str=\Core::dash_case(get_class($this));
         return str_replace('-controller','',$str);
    }

    function setDefaultLayoutTemplate()
    {
        throw new \Exception("no default template available for plain base controller, please use FrontendBaseController or BackendBaseController, or override method 'setDefaultLayoutTemplate'");
    }


    // this method overrides the methos on Illuminate\Routing\Controller

    public function callAction($method, $parameters)
    {
        // call init-function to initialize controller
        $this->init();

        $response = call_user_func_array(array($this, $method), $parameters);

        // if response is an array, render it with the template
        if (is_array($response)) {
          $response = $this->eco->createResponseWithData($response);
        }

        return $response;
    }
}

<?php
namespace Werkzeugh\Ecosystem;

interface ControllerExtensionInterface
{

    public function registerController($controller);

    public function createResponseWithData($data);

    public function init();

    public function setLayoutTemplate($bladeTemplateName);

    public function setContentTemplate($bladeTemplateName);

    public function getLayoutTemplate();

    public function getContentTemplate();
}

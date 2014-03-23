<?php

namespace Werkzeugh\Ecosystem;
use Illuminate\Routing\Controller;

class FrontendBaseController extends BaseController
{



    function setDefaultLayoutTemplate()
    {
      $this->eco->setLayoutTemplate('frontend._layouts.default');
    }

}



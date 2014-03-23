<?php

namespace Werkzeugh\Ecosystem;
use Illuminate\Routing\Controller;

class BackendBaseController extends BaseController
{



    function setDefaultLayoutTemplate()
    {
      $this->eco->setLayoutTemplate('backend._layouts.default');
    }

}



<?php

namespace LondonBusRoutes\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration as Framework;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class WebsiteController extends Controller
{
    /**
     * @Framework\Route("/", name="homepage")
     * @Framework\Template()
     */
    public function homepageAction(Request $request)
    {
        return [];
    }
}

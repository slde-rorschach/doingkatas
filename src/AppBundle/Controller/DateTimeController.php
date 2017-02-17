<?php declare(strict_types = 1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DateTimeController extends Controller
{
    /**
     * @Route(path="/datetime")
     */
    public function indexAction()
    {
        return $this->render(':datetime:index.html.twig', ['currentDate' => new \DateTime()]);
    }
}

<?php declare(strict_types = 1);

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DateTimeController
 *
 * @Route(service="app.datetime_controller")
 */
class DateTimeController
{
    private $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @Route(path="/datetime")
     */
    public function indexAction()
    {
        return new Response(
            $this->templating->render(
                ':datetime:index.html.twig',
                ['currentDate' => new \DateTime()]
            )
        );
    }
}

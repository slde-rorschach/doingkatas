<?php declare(strict_types = 1);

namespace AppBundle\Controller;

use AppBundle\Service\DateProvider;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/** @Route(service="app.datetime_controller") */
class DateTimeController
{
    private $templating;
    private $dateProvider;

    public function __construct(EngineInterface $templating, DateProvider $dateProvider)
    {
        $this->templating = $templating;
        $this->dateProvider = $dateProvider;
    }

    /** @Route(path="/datetime") */
    public function indexAction()
    {
        return new Response(
            $this->templating->render(
                ':datetime:index.html.twig',
                ['currentDate' => $this->dateProvider->getCurrentDatetime()]
            )
        );
    }
}

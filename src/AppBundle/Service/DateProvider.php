<?php declare(strict_types = 1);

namespace AppBundle\Service;

class DateProvider
{
    public function getCurrentDatetime(): \DateTime
    {
        return new \DateTime('now');
    }
}

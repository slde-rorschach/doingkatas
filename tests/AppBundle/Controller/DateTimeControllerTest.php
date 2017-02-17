<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DateTimeControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
        $client = self::createClient();

        $request = $client->request('GET', '/datetime');

        $dateTimeText = $request->filter('p')->eq(0)->text();
        $dateTime = \DateTime::createFromFormat('d/m/Y H:i:s', $dateTimeText);

        $errors = \DateTime::getLastErrors();

        $this->assertInstanceOf(\DateTime::class, $dateTime);
        $this->assertEquals(0, $errors['warning_count']);
        $this->assertEquals(0, $errors['error_count']);
    }
}

<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Service\DateProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DateTimeControllerTest extends WebTestCase
{
    public function testIndexAction()
    {
        $client = self::createClient();

        $expectedDateTime = new \DateTime('+1');

        $providerMock = \Mockery::mock(DateProvider::class, ['getCurrentDatetime' => $expectedDateTime]);
        $client->getContainer()->set('app.service.datetime', $providerMock);
        $request = $client->request('GET', '/datetime');

        $resultDateTime = \DateTime::createFromFormat(
            'd/m/Y H:i:s',
            $request->filter('p')->eq(0)->text()
        );

        $this->assertInstanceOf(\DateTime::class, $resultDateTime);
        $this->assertEquals($expectedDateTime, $resultDateTime);
    }
}

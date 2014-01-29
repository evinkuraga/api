<?php
/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 0.0.1
 */
namespace Tmdb\Tests\Factory;

class CompanyFactoryTest extends TestCase
{
    const COMPANY_ID = 1;

    /**
     * @test
     */
    public function shouldConstructCompany()
    {
        $factory = $this->getFactory();
        $data    = $this->loadByFile('company/get.json');

        $company = $factory->create($data);

        $this->assertInstanceOf('Tmdb\Model\Company', $company);
        $this->assertInstanceOf('Tmdb\Model\Image\LogoImage', $company->getLogo());

        $this->assertEquals(null, $company->getDescription());
        $this->assertEquals('San Francisco, California', $company->getHeadquarters());
        $this->assertEquals('http://www.lucasfilm.com', $company->getHomepage());
        $this->assertEquals(1, $company->getId());
        $this->assertEquals('/8rUnVMVZjlmQsJ45UGotD0Uznxj.png', $company->getLogoPath());
        $this->assertEquals('Lucasfilm', $company->getName());
        $this->assertEquals(null, $company->getParentCompany());
    }

    protected function getFactoryClass()
    {
        return 'Tmdb\Factory\CompanyFactory';
    }
}
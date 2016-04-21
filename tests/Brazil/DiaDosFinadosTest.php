<?php
/**
 *  This file is part of the Yasumi package.
 *
 *  Copyright (c) 2015 - 2016 AzuyaLabs
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author Dorian Neto <doriansampaioneto@gmail.com>
 */

namespace Yasumi\tests\Brazil;

use DateTime;
use DateTimeZone;

/**
 * Class for testing Dia dos Finados in the Brazil.
 */
class DiaDosFinadosTest extends BrazilBaseTestCase
{
    /**
     * The name of the holiday
     */
    const HOLIDAY = 'diaDosFinados';

    /**
     * The year in which the holiday was first established
     */
    const ESTABLISHMENT_YEAR = 1300;

    /**
     * Tests Dia dos Finados on or after 1300.
     */
    public function testDiaDosFinadosAfter1300()
    {
        $year = $this->generateRandomYear(self::ESTABLISHMENT_YEAR);
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year, 
            new DateTime("$year-11-02", new DateTimeZone(self::TIMEZONE)));
    }

    /**
     * Tests Dia dos Finados on or before 1300.
     */
    public function testDiaDosFinadosBefore1300()
    {
        $year = $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR-1);
        $this->assertNotHoliday(self::REGION, self::HOLIDAY, $year, 
            new DateTime("$year-11-02", new DateTimeZone(self::TIMEZONE)));
    }
}

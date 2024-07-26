<?php

use PHPUnit\Framework\TestCase;

require_once 'Service/Converter.php';

class ConverterTest extends TestCase {
    private $converter;

    protected function setUp(): void {
        $this->converter = new Converter();
    }

    public function testConvertArabicToRoman() {
        $this->assertEquals('I', $this->converter->convertArabicToRoman(1));
        $this->assertEquals('IV', $this->converter->convertArabicToRoman(4));
        $this->assertEquals('IX', $this->converter->convertArabicToRoman(9));
        $this->assertEquals('XL', $this->converter->convertArabicToRoman(40));
        $this->assertEquals('XC', $this->converter->convertArabicToRoman(90));
        $this->assertEquals('CD', $this->converter->convertArabicToRoman(400));
        $this->assertEquals('CM', $this->converter->convertArabicToRoman(900));
        $this->assertEquals('M', $this->converter->convertArabicToRoman(1000));
        $this->assertEquals('MMMCMXCIX', $this->converter->convertArabicToRoman(3999));
    }

    public function testConvertRomanToArabic() {
        $this->assertEquals(1, $this->converter->convertRomanToArabic('I'));
        $this->assertEquals(4, $this->converter->convertRomanToArabic('IV'));
        $this->assertEquals(9, $this->converter->convertRomanToArabic('IX'));
        $this->assertEquals(40, $this->converter->convertRomanToArabic('XL'));
        $this->assertEquals(90, $this->converter->convertRomanToArabic('XC'));
        $this->assertEquals(400, $this->converter->convertRomanToArabic('CD'));
        $this->assertEquals(900, $this->converter->convertRomanToArabic('CM'));
        $this->assertEquals(1000, $this->converter->convertRomanToArabic('M'));
        $this->assertEquals(3999, $this->converter->convertRomanToArabic('MMMCMXCIX'));
    }

    public function testInvalidRomanNumerals() {
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('IIII'));
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('VV'));
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('XXXX'));
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('LL'));
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('CCCC'));
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('DD'));
        $this->assertEquals('Erro! Número romano inválido.', $this->converter->convertRomanToArabic('MMMM'));
    }

    public function testArabicNumberOutOfRange() {
        $this->assertEquals('Erro! Apenas números até 3999 são permitidos.', $this->converter->convertArabicToRoman(4000));
    }
}
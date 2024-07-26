<?php

class Converter {
    private $romanMap;
    private $arabicMap;

    public function __construct() {
        $this->romanMap = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I'
        ];

        $this->arabicMap = array_flip($this->romanMap);
    }

    public function convertArabicToRoman($number) {
        if ($number > 3999) {
            return "Erro! Apenas números até 3999 são permitidos.";
        }

        $result = '';
        foreach ($this->romanMap as $value => $symbol) {
            while ($number >= $value) {
                $result .= $symbol;
                $number -= $value;
            }
        }
        return $result;
    }

    public function convertRomanToArabic($roman) {

        if (!$this->isValidRoman($roman)) {
            return "Erro! Número romano inválido.";
        }

        $result = 0;
        $i = 0;
        while ($i < strlen($roman)) {
            if ($i + 1 < strlen($roman) && isset($this->arabicMap[$roman[$i] . $roman[$i + 1]])) {
                $result += $this->arabicMap[$roman[$i] . $roman[$i + 1]];
                $i += 2;
            } else {
                $result += $this->arabicMap[$roman[$i]];
                $i++;
            }
        }
        return $result;
    }

    //Ao executar o teste unitário, na função testInvalidRomanNumerals, o teste falha. Isso ocorre porque precisamos
    //verificar se o número romano é válido. Por exemplo, o número romano IIII não é válido, pois o número 4 é representado
    //por IV. IA ajudou aqui porque Deus que me livre fazer isso na mão.
    private function isValidRoman($roman) {
        $pattern = '/^(?=[MDCLXVI])M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';
        return preg_match($pattern, $roman) === 1;
    }
}
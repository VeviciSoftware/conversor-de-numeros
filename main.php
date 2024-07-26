<?php

require_once 'Service/Converter.php';

$converter = new Converter();
$operation = readline("Escolha a operação (1: Arábico para Romano, 2: Romano para Arábico): ");

switch ($operation) {
    case '1':
        $number = (int)readline("Digite o número arábico: ");
        echo "Romano: " . $converter->convertArabicToRoman($number) . PHP_EOL;
        break;
    case '2':
        $roman = readline("Digite o número romano: ");
        echo "Arábico: " . $converter->convertRomanToArabic($roman) . PHP_EOL;
        break;
    default:
        echo "Operação inválida." . PHP_EOL;
        break;
}
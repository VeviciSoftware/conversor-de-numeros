# Conversor de Números

Esse repositório tem como objetivo realizar a conversão de números arábicos para números romanos, e vice-versa. Para isso, utiliza-se o maior número possível de conceitos de POO (Programação Orientada a Objetos) e uma estrutura básica, porém eficaz, de projetos.
Além disso, também foram adicionados testes unitários.

## Bibliotecas/Pacotes obrigatórios

- **PHPUnit**: Para instalar o PHPUnit, execute o comando:
  ```sh
  composer require --dev phpunit/phpunit


## Execução do projeto

Para executar o projeto, utilize: caminho/para/arquivo/converter-numeros> php main.php

## Execução dos testes

Para executar os testes do projeto, utilize: vendor\bin\phpunit --colors tests

## Pontos que valem destaque

Função REGEX
A função REGEX no arquivo Converter.php funciona da seguinte forma:

^(?=[MDCLXVI]): Assegura que a string contenha apenas os caracteres válidos de números romanos.
M{0,3}: Permite de 0 a 3 'M' (1000).
(CM|CD|D?C{0,3}): Permite 'CM' (900), 'CD' (400), 'D' (500) seguido de até 3 'C' (100), ou até 3 'C' sem 'D'.
(XC|XL|L?X{0,3}): Permite 'XC' (90), 'XL' (40), 'L' (50) seguido de até 3 'X' (10), ou até 3 'X' sem 'L'.
(IX|IV|V?I{0,3}): Permite 'IX' (9), 'IV' (4), 'V' (5) seguido de até 3 'I' (1), ou até 3 'I' sem 'V'.
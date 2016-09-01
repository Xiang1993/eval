<?php
require 'ast/Exp.php';
require 'ast/Program.php';
require 'Eval.php';

/**
a := 1;
num := 100;
i := 0;
sum := 0;
while (i < num) 
{
    sum := sum + a;
    a := a + 1;
    i := i + 1;
}
print sum
*/

$a = new ExpVar('a');
$assignStmt1 = new ProgramAssign($a, new ExpNum(1));  // a := 1

$num = new ExpVar('num');
$assignStmt2 = new ProgramAssign($num, new ExpNum(100));  // num := 100

$i = new ExpVar('i');
$assignStmt3 = new ProgramAssign($i, new ExpNum(0));  // i := 0

$sum = new ExpVar('sum');
$assignStmt4 = new ProgramAssign($sum, new ExpNum(0));   // sum := 0

$pred = new ExpLT($i, $num);   // i < num
$body1 = new ProgramAssign($sum, new ExpPlus($sum, $a));   // sum := sum + a
$body2 = new ProgramAssign($a, new ExpPlus($a, new ExpNum(1)));   // a := a + 1
$body3 = new ProgramAssign($i, new ExpPlus($i, new ExpNum(1)));   // i := i + 1
$whileStmt = new ProgramWhile($pred, new ProgramStmts([$body1, $body2, $body3]));   // while ...

$printStmt = new ProgramPrint($sum);   // print sum

$stmts = [
    $assignStmt1,
    $assignStmt2,
    $assignStmt3,
    $assignStmt4,
    $whileStmt,
    $printStmt
];
evalProgram(new ProgramStmts($stmts));
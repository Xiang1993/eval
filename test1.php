<?php
require 'ast/Exp.php';
require 'ast/Program.php';
require 'Eval.php';

/**
代码: 
a := 10 ;
b := 100 ;

if ( a < b ) then
{
    min := a ;
    max := b
}
else 
{
    min := b ;
    max := a
}

print a;
print b;
print min;
print max;

*/

// 语法树
$a = new ExpVar('a');
$b = new ExpVar('b');
$assignStmt1 = new ProgramAssign($a, new ExpNum(10));   // a := 10;
$assignStmt2 = new ProgramAssign($b, new ExpNum(100));  // b := 100;

$pred = new ExpLT($a, $b);    // a < b

$min = new ExpVar('min');
$max = new ExpVar('max');
$stmt1 = new ProgramAssign($min, $a);    // min := a;
$stmt2 = new ProgramAssign($max, $b);   // max : = b;
$stmt3 = new ProgramStmts([$stmt1, $stmt2]);    // min := a; max := b;

$stmt4 = new ProgramAssign($min, $b);   // min := b;
$stmt5 = new ProgramAssign($max, $a);   // max := a;
$stmt6 = new ProgramStmts([$stmt4, $stmt5]);    // min := b; max := a;

$ifelseStmt = new ProgramIfElse($pred, $stmt3, $stmt6);     // if (a < b) then {min := a; max := b;} else {min := b; max := a;}

$print_a = new ProgramPrint($a);   // print a
$print_b = new ProgramPrint($b);   // print b
$print_min = new ProgramPrint($min);   // print min
$print_max = new ProgramPrint($max);   // print max

// 解释执行
$stmts = [
    $assignStmt1,
    $assignStmt2,
    $ifelseStmt,
    $print_a,
    $print_b,
    $print_min,
    $print_max
];

evalProgram(new ProgramStmts($stmts));

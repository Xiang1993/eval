<?php
require 'ast/Exp.php';
require 'ast/Program.php';
require 'Eval.php';

/**
代码
fact := 1 ;
val := 10000 ;
cur := val ;
mod := 1000000007 ;

while ( cur > 1 )
  do
   {
      fact := fact * cur ;
      fact := fact - fact / mod * mod ;
      cur := cur - 1
   } ;

cur := 0
*/

// 语法树
$fact = new ExpVar('fact');
$assignStmt1 = new ProgramAssign($fact, new ExpNum(1));  // fact := 1 ;

$val = new ExpVar('val');
$assignStmt2 = new ProgramAssign($val, new ExpNum(10000));  // val := 10000 ;

$cur = new ExpVar('cur');
$assignStmt3 = new ProgramAssign($cur, $val);  // cur := val ;

$mod = new ExpVar('mod');
$assignStmt4 = new ProgramAssign($mod, new ExpNum(1000000007));  // mod := 1000000007 ;

$plusStmt = new ProgramAssign($fact, new ExpSub($fact, new ExpMul(new ExpDiv($fact, $mod), $mod)));

$pred = new ExpGT($cur, new ExpNum(1));  // cur > 1
$body1 = new ProgramAssign($fact, new ExpMul($fact, $cur));  // fact := fact * cur ;
$body2 = new ProgramAssign($fact, new ExpSub($fact, new ExpMul(new ExpDiv($fact, $mod), $mod)));  // fact := fact - fact / mod * mod ;
$body3 = new ProgramAssign($cur, new ExpSub($cur, new ExpNum(1)));   // cur := cur - 1
$body = new ProgramStmts([$body1, $body2, $body3]); 
$whileStmt = new ProgramWhile($pred, $body);   // while ...

$assignStmt5 = new ProgramAssign($cur, new ExpNum(0));   // cur := 0

$print_cur = new ProgramPrint($cur);   // print cur
$print_fact = new ProgramPrint($fact); // print fact
$print_mod = new ProgramPrint($mod);   // print mod
$print_val = new ProgramPrint($val);   // print val

// 解释执行
$stmts = [
    $assignStmt1, 
    $assignStmt2, 
    $assignStmt3, 
    $assignStmt4, 
    $whileStmt,
    $assignStmt5,
    $print_cur,
    $print_fact,
    $print_mod,
    $print_val  
];
evalProgram(new ProgramStmts($stmts));

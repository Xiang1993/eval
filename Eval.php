<?php
function evalExp(Exp $e)
{
    if ($e instanceof ExpNum) {
        return $e->val;
    } 
    elseif ($e instanceof ExpVar) {
        return $e->val;
    } 
    elseif ($e instanceof ExpPlus) {
        return evalExp($e->left) + evalExp($e->right);
    } 
    elseif ($e instanceof ExpSub) {
        return evalExp($e->left) - evalExp($e->right);
    } 
    elseif ($e instanceof ExpMul) {
        return evalExp($e->left) * evalExp($e->right);
    } 
    elseif ($e instanceof ExpDiv) {
        return floor(evalExp($e->left) / evalExp($e->right));
    } 
    elseif ($e instanceof ExpLT) {
        return evalExp($e->left) < evalExp($e->right);
    } 
    elseif ($e instanceof ExpGT) {
        return evalExp($e->left) > evalExp($e->right);
    } 
    elseif ($e instanceof ExpAnd) {
        return evalExp($e->left) && evalExp($e->right);
    } 
    elseif ($e instanceof ExpOr) {
        return evalExp($e->left) || evalExp($e->right);
    } 
    elseif ($e instanceof ExpBoolLiteral) {
        return evalExp($e->val);
    }
}

function evalProgram($p)
{   
    if ($p instanceof ProgramAssign) {         // 执行赋值语句
        $p->lhs->val = evalExp($p->rhs);
    } 
    elseif ($p instanceof ProgramIfElse) {    // 执行if语句
        if (evalExp($p->pred)) {
            evalProgram($p->conseq);
        } 
        else {
            evalProgram($p->alter);
        }
    } 
    elseif ($p instanceof ProgramWhile) {   // 执行while语句
        while (evalExp($p->pred)) {
            evalProgram($p->body);
        }
    } 
    elseif ($p instanceof ProgramStmts) {   // 执行语句块
        foreach ($p->stmts as &$stmt) {
            evalProgram($stmt);
        }
    } 
    elseif ($p instanceof ProgramPrint) {   // 执行print语句
        echo $p->val->val . "\n";
    }
}

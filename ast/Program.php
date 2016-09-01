<?php
abstract class Program
{
}

class ProgramStmts extends Program
{
    public $stmts;
    public function __construct(array $stmts)
    {
        $this->stmts = $stmts;
    }
}

class ProgramAssign extends Program
{
    public $lhs;    // string
    public $rhs;    // Exp
    public function __construct($lhs, Exp $rhs)
    {
        $this->lhs = $lhs;
        $this->rhs = $rhs;
    }
}

class ProgramIfElse extends Program
{
    public $pred;   // Exp
    public $conseq; // Program
    public $alter;  // Program
    public function __construct($pred, Program $conseq, Program $alter)
    {
        $this->pred = $pred;
        $this->conseq = $conseq;
        $this->alter = $alter;
    }
}

class ProgramWhile extends Program
{
    public $pred;   // Exp
    public $body;   // Program
    public function __construct(Exp $pred, Program $body)
    {
        $this->pred = $pred;
        $this->body = $body;
    }
}

class ProgramPrint extends Program
{
    public $val;
    public function __construct(ExpVar $val)
    {
        $this->val = $val;
    }

}
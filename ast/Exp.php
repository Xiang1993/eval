<?php

abstract class Exp 
{
}

class ExpPlus extends Exp 
{
    public $left;   // Exp
    public $right;  // Exp
    public function __construct(Exp $left, Exp $right) 
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpSub extends Exp 
{
    public $left;  // Exp
    public $right;  // Exp
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpMul extends Exp
{
    public $left;   // Exp
    public $right;  // Exp
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpDiv extends Exp
{
    public $left;   // Exp
    public $right;  // Exp
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpVar extends Exp
{
    public $val;    // String
    public function __construct($val)
    {
        $this->val = $val;
    }
}

class ExpNum extends Exp
{
    public $val;
    public function __construct($val)
    {
        $this->val = $val;
    }
}

class ExpLT extends Exp
{
    public $left;
    public $right;
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpGT extends Exp
{
    public $left;
    public $right;
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpAnd extends Exp
{
    public $left;
    public $right;
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpOr extends Exp
{
    public $left;
    public $right;
    public function __construct(Exp $left, Exp $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class ExpBoolLiteral extends Exp
{
    public $val;    // bool
    public function __construct($val)
    {
        $this->val = $val;
    }
}


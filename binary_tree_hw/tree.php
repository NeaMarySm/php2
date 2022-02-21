<?php


class Tree
{
    private $stack;
    private $root;
    private $x, $y, $z;
    private $vars = [
        'x', 'y', 'z'
    ];

    public function __construct()
    {
        $this->stack = new SplStack();
    }

    public function runCalculation($x = 0, $y = 0, $z = 0){
        if(is_numeric($x) && is_numeric($y) && is_numeric($x)){
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
            return $this->calculate($this->root);
        }
        else{
            return "not a number";
        }
    }


    public function buildTree($arr)
    {
        foreach ($arr as $item){
            $this->insert($item);
        }
        $this->root = $this->stack->pop();
        return $this->root;
    }
   
    private function insert($item)
    {
        if(preg_match(Parser::NUMBER_PATTERN, $item)){
            $this->stack->push(new Node($item));
        }
        else if(preg_match(Parser::OPERATION_PATTERN, $item)){
            $leftNode = $this->stack->pop();
            $rightNode = $this->stack->pop();
            $this->stack->push(new Node($item, $leftNode, $rightNode));
        }
    }

   
    private function calculate(Node &$node)
    {
        if(preg_match(Parser::NUMBER_PATTERN, $node->value)){
            if(in_array($node->value, $this->vars)){
                return $this->assignValue($node->value); // возвращаем в замен x y z число
            }
            return $node->value;
        }
        else if(preg_match(Parser::OPERATION_PATTERN, $node->value)){
            switch ($node->value){
                case '+': {
                    return $this->calculate($node->right) + $this->calculate($node->left);
                }
                case '-': {
                    return $this->calculate($node->right) - $this->calculate($node->left);
                }
                case '*': {
                    return $this->calculate($node->right) * $this->calculate($node->left);
                }
                case '^': {
                    return pow($this->calculate($node->right), (int)$this->calculate($node->left));
                }
                case '/': {
                    try{
                        return $this->calculate($node->right) / $this->calculate($node->left);
                    }
                    catch (ArithmeticError $e){
                        exit('division by zero' . $e->getTraceAsString());
                    }
                }
            }
        }
    }

    private function assignValue($value)
    {
        switch ($value){
            case 'x': return $this->x;
            case 'y': return $this->y;
            case 'z': return $this->z;
            default: exit('not accepted variable');
        }
    }
}
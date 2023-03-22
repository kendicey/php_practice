<?php

class Ingredient
{
    protected $name;
    protected $cost;
    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCost()
    {
        return $this->cost;
    }
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
}

class Entree
{
    private $name;
    protected $ingredients = array();
    public function getName()
    {
        return $this->name;
    }
    public function __construct($name, $ingredients)
    {
        if (!is_array($ingredients)) {
            throw new Exception('$ingredients must be an array');
        }
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
}

class EntreeSub extends Entree
{
    public function __construct($name, $ingredients)
    {
        parent::__construct($name, $ingredients);
        foreach ($this->ingredients as $ingredient) {
            if (!$ingredient instanceof Ingredient) {
                throw new Exception('Elements of $ingredients must be Ingredient objects');
            }
        }
    }
    public function totalCost()
    {
        $cost = 0;
        foreach ($this->ingredients as $ingredient) {
            $cost += $ingredient->getCost();
        }
        return $cost;
    }
}
?>
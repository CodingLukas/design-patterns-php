<?php


namespace RefactoringGuru\TemplateMethod\Conceptual;


abstract class Sub
{

    public function make(): Sub
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    protected abstract function addPrimaryToppings(): Sub;

    public function layBread(): Sub
    {
        var_dump('laying down the bread');

        return $this;
    }

    public function addLettuce(): Sub
    {
        var_dump('add some lettuce');

        return $this;
    }

    public function addSauces(): Sub
    {
        var_dump('add oil and vinegar');

        return $this;
    }

}

class TurkeySub extends Sub
{

    protected function addPrimaryToppings(): TurkeySub
    {
        var_dump('add some turkey');

        return $this;
    }
}

class VeggieSub extends Sub
{

    protected function addPrimaryToppings(): VeggieSub
    {
        var_dump('add some veggies');

        return $this;
    }
}

(new TurkeySub())->make();
echo "\n";

(new VeggieSub())->make();
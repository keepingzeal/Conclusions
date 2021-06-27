<?php
$test = new class{
    public function getName()
    {
        echo 'ni hao';
    }
};
$test->getName();

function test01()
{
    return new class{
        public function getName()
        {
            echo '123123';
        }
    };
};
test01()->getName();


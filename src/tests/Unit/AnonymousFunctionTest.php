<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AnonymousFunctionTest extends TestCase
{
    public function testFunc() {
        $result = $this->defaultValues([]);
        $this->assertEquals($result['status'], 1);
        $result = $this->defaultValues(['status' => 2]);
        $this->assertEquals($result['status'], 2);
    }

    private function defaultValues($values) {
        $fields = [
            'status' =>  fn(&$values, $name) => $values[$name] = 1,
        ];
        return $this->valuesDefaultIfEmpty($values, $fields);
    }

    private function valuesDefaultIfEmpty($values, $fields)
    {
        foreach ($fields as $name => $setter_func) {
            if (!array_key_exists($name, $values) || empty($values[$name])) {
                $setter_func($values, $name);
            }
        }
        return $values;
    }
}
<?php

namespace App\Actions;

class Calculate
{
    public function __invoke(array $data)
    {
        switch ($data['operation']) {
            case '+':
                return $data['numbers'][0] + $data['numbers'][1];
            break;
            case '-':
                return $data['numbers'][0] - $data['numbers'][1];
            break;
            case '*':
                return $data['numbers'][0] * $data['numbers'][1];
            break;
            case '/':
                return $data['numbers'][0] / $data['numbers'][1];
            break;
        }
    }
}

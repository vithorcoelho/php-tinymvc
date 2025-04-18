<?php

namespace App\Controllers;
class HelloWorld 
{
    public function __invoke()
    {
        $users = [
            ['name' => 'João'],
            ['name' => 'Maria'],
        ];
        view('Hello', $users);
    }

    public function aboutMe()
    {
        echo 'About me';
    }
}
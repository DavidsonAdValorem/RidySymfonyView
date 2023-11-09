<?php

namespace App\DataFixtures;

use App\Entity\Skills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $skills = [
            [
                'name' => 'JavaScript',
                'lev' => 90,
                'img' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png',
                'type' => 'Programming Language',
                'side' => 'Front-end',
                'desc' => 'JavaScript (JS) is a lightweight, interpreted programming language that adds interactivity to web pages. It is one of the three core technologies of the World Wide Web, along with HTML and CSS. JS is used to create dynamic and interactive web pages'
            ],
            [
                'name' => 'PHP',
                'lev' => 90,
                'img' => 'https://i.stack.imgur.com/8xk69.png',
                'type' => 'Programming Language',
                'side' => 'Back-end',
                'desc' => "
                PHP is a general-purpose scripting language that is especially suited for web development. It is free and open-source, and it is one of the most popular programming languages in the world. PHP is a server-side language, which means that it is executed on the web server before the HTML is sent to the client's browser. This makes PHP ideal for creating dynamic and interactive web pages."
            ],
            [
                'name' => 'Vue',
                'lev' => 80,
                'img' => 'https://i2.wp.com/www.onasus.com/wp-content/uploads/2018/04/vuejs-javascript-framework.jpg?zoom=2&fit=544%2C550&ssl=1',
                'type' => 'Framework',
                'side' => 'Front-end',
                'desc' => 'Vue.js is a progressive JavaScript framework for building user interfaces. It is lightweight, flexible, and easy to learn. Vue.js is also highly performant and can be used to build complex single-page applications. Vue.js is based on a component-based architecture. Components are reusable pieces of code that can be combined to create complex UIs. Vue.js also provides a number of features that make it easy to develop interactive and dynamic UIs, such as data binding, event handling, and routing.'
            ],
        ];
        foreach ($skills as $sk) {
            $skill = new Skills();
            $skill->setName($sk["name"]);
            $skill->setSide($sk["side"]);
            $skill->setUrlImg($sk["img"]);
            $skill->setType($sk["type"]);
            $skill->setLevel($sk["lev"]);
            $skill->setDescription($sk["desc"]);
            $manager->persist($skill);
        }

        $manager->flush();
    }
}

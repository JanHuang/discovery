<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Http\Controller;


use FastD\Http\Response;
use Twig_Environment;
use Twig_Loader_Filesystem;

class ViewController
{
    public function view()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../View');

        $twig = new Twig_Environment($loader);

        $content = $twig->render('index.twig', array('name' => 'Fabien'));

        return new Response($content);
    }
}
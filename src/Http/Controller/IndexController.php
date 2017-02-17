<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Http\Controller;


use FastD\Http\ServerRequest;

class IndexController
{
    public function services(ServerRequest $request)
    {
        $services = database()->select('services', '*');

        return json($services);
    }
}
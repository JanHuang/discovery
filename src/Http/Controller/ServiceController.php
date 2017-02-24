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

class ServiceController
{
    public function services(ServerRequest $request)
    {
        $services = database()->select('services', '*');

        return json($services);
    }

    public function monitor()
    {
        $services = database()->select('monitor', [
            'id', 'service', 'target', 'source', 'pid'
        ]);

        $nodes = [];
        $edges = [];
        foreach ($services as $index => $service) {
            $source = $service['service'] . long2ip($service['source']);
            $target = $service['service'] . long2ip($service['target']);
            $nodes[] = [
                'id' => $source,
                'x' => 10 * $index,
                'y' => 10 * $index,
            ];
            $edges[] = [
                'source' => $source,
                'target' => $target,
                'id' => $source . '-' . $target,
                'value' => (string) $index,
            ];
        }

        return json([
            'nodes' => $nodes,
            'edges' => $edges
        ]);
    }
}
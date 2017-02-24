<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Server;


use FastD\Swoole\Server\Tcp;
use swoole_server;

class Monitor extends Tcp
{
    /**
     * @param swoole_server $server
     * @param $fd
     * @param $data
     * @param $from_id
     * @return mixed
     */
    public function doWork(swoole_server $server, $fd, $data, $from_id)
    {
        $json = json_decode($data, true);

        $json['target'] = ip2long($json['target']);
        $json['source'] = ip2long($json['source']);

        $row = database()->query('select * from monitor where target = ' . $json['target'] . ' and source = \'' . $json['source'] . '\'')->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            database()->insert('monitor', [
                'target' => $json['target'],
                'source' => $json['source'],
                'cmd' => $json['cmd']
            ]);
        } else {
            database()->update('monitor', [
                'target' => $json['target'],
                'source' => $json['source'],
                'cmd' => $json['cmd']
            ], [
                'AND' => [
                    'source' => $json['source'],
                    'target' => $json['target']
                ]
            ]);
        }

        return 'ok';
    }
}
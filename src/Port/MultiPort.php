<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Port;


use FastD\Packet\Json;
use FastD\Swoole\Server\Tcp as TCP;
use swoole_server;

class MultiPort extends TCP
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
        $json = Json::decode($data);

        $json['host'] = ip2long($json['host']);

        $row = database()->query('select * from services where host = ' . $json['host'] . ' and service = \'' . $json['service'] . '\'')->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            database()->insert('services', $json);
        } else {
            database()->update('service', $json, [
                'AND' => [
                    'host' => $json['host'],
                    'service' => $json['service']
                ]
            ]);
        }

        return 'hello tcp';
    }
}
<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

return [
    'listen' => 'http://127.0.0.1:9887',
    'options' => [
        'pid_file' => '',
        'worker_num' => 10
    ],
    'ports' => [
        [
            'class' => \Server\Discovery::class,
            'listen' => 'tcp://127.0.0.1:9888',
            'options' => [

            ],
        ],
        [
            'class' => \Server\Monitor::class,
            'listen' => 'tcp://127.0.0.1:9889',
            'options' => [
            ],
        ],
    ],
];
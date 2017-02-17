<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Processor;


use FastD\Swoole\Process;
use swoole_process;
use swoole_table;

class ServerProcessor extends Process
{
    public function handle(swoole_process $swoole_process)
    {
        timer_tick(1000, function () use ($file) {
//            swoole_async_writefile($file, $file_content, function($filename) {
//                echo $filename . "\t wirte ok.\n";
//            }, $flags = 0);
        });
    }
}
<?php

route()->get('/', 'ViewController@view');

route()->get('/services', 'ServiceController@services');
route()->get('/monitor', 'ServiceController@monitor');

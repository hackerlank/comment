<?php
$map = [
	'Comment' => ['save', 'getList', 'changeStatusPass', 'changeStatusUnpass', 'del']
];

define('CONTROL_ACTION_MAP', serialize($map));
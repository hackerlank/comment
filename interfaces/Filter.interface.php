<?php
namespace Comment\Interfaces;

interface Filter {
	abstract public function save();
	
	abstract public function show();
	
	abstract public function remove();
}
<?php
namespace Comment\Libraries;

class Application
{
	private static $_self;
	
	private $controlActionMap;
	
	private $siteid = '';
	private $control = '';
	private $action = '';
	
	public static function getInstance($siteid='', $control='', $action='')
	{
		if (empty(self::$_self)) {
			self::$_self = new self($siteid, $control, $action);			
		}
		return self::$_self;
	}
	
	public function exec()
	{
		$className = ucfirst($this->getControl());				
		$funcName = $this->getAction();		
		$camp = $this->getControlActionMap();
		if (!empty($camp) && in_array($funcName, $camp[$className])) {
			$class = "Comment\Controllers\\$className";
			$object = new $class;
			$result = call_user_func(array($object, $funcName));
		} else {
			throw new \Exception('找不到对应的control和action');
		}
		return $result;
	}
	
	private function __construct($siteid, $control, $action)
	{
		$this->setSiteid($siteid);
		$this->setControl($control);
		$this->setAction($action);
		
		$camp = unserialize(CONTROL_ACTION_MAP);
		$this->setControlActionMap($camp);
	}
	
	private function setSiteid($siteid)
	{
		$this->siteid = $siteid;
	}
	
	private function getSiteid()
	{
		return $this->siteid;
	}
	
	private function setControl($control)
	{
		$this->control = $control;
	}
	
	private function getControl()
	{
		return $this->control;
	}
	
	private function setAction($action)
	{
		$this->action = $action;
	}
	
	private function getAction()
	{
		return $this->action;
	}
	
	private function setControlActionMap($camp)
	{
		$this->controlActionMap = $camp;
	}
	
	private function getControlActionMap()
	{
		return $this->controlActionMap;
	}
}
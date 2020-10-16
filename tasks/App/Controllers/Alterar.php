<?php

namespace App\Controllers;

use UNIS\Controller\Action;
use UNIS\Di\Container;

class Alterar extends Action
{
	private $task;

	public function __construct()
	{
		parent::__construct();
		$this->task = Container::getClass('task');
	}

	public function alterar()
	{
		if(!is_null($this->getParam())) {
			$this->view->result = $this->getParam();
		}

		$this->view->taskList = $this->task->fetchAll();

		
		$this->render('alterar');

	}
	public function edit()
	{
		$id = array_pop($_POST);
		$this->task->update($_POST,$id);
		$this->redirect('/');

	}

}
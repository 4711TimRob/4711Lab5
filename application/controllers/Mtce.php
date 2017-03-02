<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mtce extends Application
{

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/
	* 	- or -
	* 		http://example.com/welcome/index
	*
	* So any other public methods not prefixed with an underscore will
	* map to /welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	
	public function index()
	{
		$this->data['pagetitle'] = 'TODO List Maintenance';
		$tasks = $this->tasks->all(); // get all the tasks


		// substitute the status name
		foreach ($tasks as $task)
		if (!empty($task->status))
		$task->status = $this->statuses->get($task->status)->name;

		// build the task presentation output
		$result = '';   // start with an empty array        
		foreach ($tasks as $task)
		$result .= $this->parser->parse('oneitem',(array)$task,true);

		// and then pass them on
		$this->data['display_tasks'] = $result;
		$this->data['pagebody'] = 'itemlist';
		$this->render();
		
	}
}

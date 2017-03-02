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

	private $items_per_page = 10;
	
	public function index()
	{
		$this->page(1);	
	}

	private function show_page($tasks)
	{
		$this->data['pagetitle'] = 'TODO List Maintenance';

	    // build the task presentation output
	    $result = ''; 	// start with an empty array   

	    foreach ($tasks as $task)
	    {
	        if (!empty($task->status))
	            $task->status = $this->statuses->get($task->status)->name;
	        $result .= $this->parser->parse('oneitem', (array) $task, true);
	    }

	    $this->data['display_tasks'] = $result;

	    // and then pass them on
	    $this->data['pagebody'] = 'itemlist';
	    $this->render();
	}

	// Get a page of items, starting at the beginning
	function page($pageNum = 1) 
	{
		$records = $this->tasks->all();
		$tasks = array();

		// use a foreach loop, because the record indices may not be sequential
	    $index = 0; // where are we in the tasks list
	    $count = 0; // how many items have we added to the extract
	    $start = ($pageNum - 1) * $this->items_per_page;
	    foreach($records as $task) 
	    {
	        if ($index++ >= $start) 
	        {
	            $tasks[] = $task;
	            $count++;
	        }

	        if ($count >= $this->items_per_page) 
	        	break;
	    }
	    $this->show_page($tasks);
	}
}

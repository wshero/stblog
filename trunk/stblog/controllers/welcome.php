<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
		
		$this->output->enable_profiler(TRUE);
	}

	function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
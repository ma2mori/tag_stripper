<?php

class tagStripper
{

	/**
	 * __construct
	 *
	 * @param str $take_dir
	 * @param str $put_dir
	 */
	public function __construct($take_dir = null,$put_dir = null)
	{

		$this->take_dir = $take_dir ?? __DIR__; 
		$this->put_dir  = $put_dir  ?? __DIR__; 
		$this->path     = $this->take_dir . '/*.html';
		$this->files    = glob($this->path);

	}

	public function stripTags()
	{

		foreach($this->files as $f){

			$file_name = pathinfo($f)['filename'];
			$base      = file($f);
			$texts     = "";
		
			foreach($base as $val){
				$texts .= $val;
			}
		
			$without_tags      = strip_tags($texts);
			$without_spaces    = str_replace([" ", "　"],"",$without_tags);
			$without_indention = str_replace(["\r\n", "\r", "\n"], '', $without_spaces);
		
			file_put_contents($this->put_dir.'/'.$file_name.'_'.date('YmdHis').'.text',$without_indention);
		
		}

	}

}

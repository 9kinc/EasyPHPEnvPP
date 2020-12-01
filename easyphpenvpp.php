<?php

class EasyPHPEnvPP{
	
	private $foundfile = false;
	private $arrayData = array();
	private $errors = array();
	
	public function __construct($filepath)
    {
        // file path to open
		if(!file_exists($filepath)){
			$this->foundfile = false;
			$this->errors[] = "File not found: ".$filepaths;
			return;
		}
		
		$this->foundfile = true;
		$this->ReadFileIntoArray($filepath); 
		 
    }
	
	private function ReadFileIntoArray($filepath){
		// Get file content to parse
		$file_content = file_get_contents($filepath);
		
		// split every line 
		$split_lines = preg_split("/\r\n|\n|\r/", $file_content);
		$lines_count = count($split_lines);
		if($lines_count <= 0){
			// no lines
			$this->errors[] = "This file is empty";
			return;
		}
		
		$list_duplicates = array();
		$added_lines = 0;
		// loop the lines one by one
		for($i = 0; $i < $lines_count; $i++){
			$line1 = $split_lines[$i]; // get the line data
			$line1 = trim($line1);
			// if line is empty
			if(strlen($line1) <= 1){
				continue;
			}
			
			// check if its a comment line
			if(substr($line1,0,1) == "#"){
				continue;
			}
			
			// split the line into key and value pairs
			$line_parts = explode("=",$line1);
			
			if(!isset($line_parts[0])){
				$this->errors[] = "Key not set!";
				continue;
			}
			
			if(!isset($line_parts[1])){
				$this->errors[] = "Value not set for key ".$line_parts[0];
				continue;
			}
			
			$_key = $line_parts[0];
			$_value = trim($line_parts[1]);
			
			if(in_array($_key,$list_duplicates)){
				// Duplicate Key
				$this->errors[] = "Skip duplicate key ".$_key;
				continue;
			}
			
			// check key is valid
			if(!preg_match("/^[a-zA-Z0-9-_]+$/",$_key)){
				$this->errors[] = "Invalid key ".$_key;
				continue;
			}
			
			// track duplicate keys
			$list_duplicates[] = $_key;
			
			// store the key and value into a array
			$dx = array();
			$dx["key"] = $_key;
			$dx["value"] = "".$_value; 
			$this->arrayData[] = $dx;
			$this->LoadEnvVars($_key,$_value);
			$added_lines++;
			// parse done
		}
		
		if($added_lines <=0){
			$this->errors[] = "This file is empty";
		}
	}
	
	private function LoadEnvVars($key,$value){
		$_ENV[$key] = $value;
		$_SERVER[$key] = $value;
	}
	
	public function get_data_list(){
		return $this->arrayData;
	}
	
	public function get_errors(){
		return $this->errors;
	}
	
	public function get_file_found(){
		return $this->foundfile;
	}
	
	
	function print_data(){
		$c = count($this->arrayData);
		$dx = "";
		
		for($i=0; $i< $c; $i++){
			$item = $this->arrayData[$i];
			$itemKey = $item["key"];
			$itemValue = $item["value"];
			
			$dx.= $itemKey.'='.$itemValue;
			$dx.= '<br>';
		}
		return $dx;
	}
}

?>
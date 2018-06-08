<?php
	/**
	 *  @brief (Кешування файлів для MODIFIED)
	 *  
	 *  @details 
	 */
function CacheControls($file){
	if (Cash) {		
		
		Global $result;

		$result=array();
		$write=0;	
		$writeText=''; 
				
			   ///***Функці пошуку файлів в казаному каталозі**
			   function glob_recursive($dir, $mask){ Global $result;
			   
			   
					foreach(glob($dir.'/*') as $filename){
							if(strtolower(substr($filename, strlen($filename)-strlen($mask), strlen($mask)))==strtolower($mask)) 
			if ($filename==CashFile) {continue;}
						$result[$filename]=filemtime($filename);
						
							if(is_dir($filename)) glob_recursive($filename, $mask);
					}		
				
				}
				
				///*** Пошуку файлів в каталогах з ControlDir**
					foreach (ControlDir as $t){
						
						glob_recursive($t);
					}
					
				$cashFile = parse_ini_file(CashFile);	
				
				foreach($result as $key=>$t) {
					
					if (array_key_exists($key, $cashFile)) {
						if ($cashFile[$key]!=$t) {	$write=1; }
					} else {$write=1;}
				
				$writeText.=$key."=".$t."\r\n";
				}
						
				if ($write) {
					$fp = fopen(CashFile, "w"); // Открываем файл в режиме записи
					$test = fwrite($fp, $writeText); 
				}

				if (array_search($file, NotCashlFile) ===false) {  	
					
	header("Cache-Control: public");
	header("Expires: " . date("r", time()+CashTime));

		$last_modified_time = filemtime($file);

		if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $last_modified_time 
			&& $write==0 && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= filemtime(CashFile)){
		    header('HTTP/1.1 304 Not Modified');
		   die; ///*** убили всё, что ниже**
		}
		
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
		
	///***Cesh End**
					}
		
		}
	
}
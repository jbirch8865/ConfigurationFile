<?php
namespace Config;

class ConfigurationFile
{
	private $Configurations;
	function __construct($fileName = "config.local.ini")
	{
		if($this->IsThisAString($fileName))
		{
			if($this->DoesFileExist($fileName))
			{
				$this->Configurations = LoadFile($fileName);
			}else
			{
				$this->Configurations = array();
			}
		}else
		{
			throw new \Exception("This is not a valid filename");
		}
	}
	
	private function DoesFileExist($fileName)
	{
		if(IsThisAString($fileName))
		{
			$file = dirname(__FILE__) . '/' .$fileName;
			if(file_exists($file))
			{
				return true;
			}else
			{
				return false;
			}
		}else
		{
			return false;
		}
	}

	private function IsThisAString($string)
	{
		try
		{
			$string = (string) $string;
			return true;
		}catch
		{
			return false;
		}
	}

	private function LoadFile($fileName)
	{
		try
		{
			return parse_ini_file ($fileName);
		} catch (\Exception $e)
		{
			throw new \Exception("Error loading this ini configuration file");
		}
	}

	function Configurations()
	{
		return $this->Configurations;
	}
}


?>
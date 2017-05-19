<?php
App::uses('CakeEmail', 'Network/Email');

class CommonComponent extends Component
{
	var $component = ["Crop"];
	var $sourceDir;
	function rcopy($src, $dst) {
		//if (file_exists ( $dst ))
			//$this->rrmdir ( $dst );
		if (is_dir ( $src )) {
			$this->create_dir ( $dst );
			$files = scandir ( $src );
			foreach ( $files as $file )
				if ($file != "." && $file != "..")
					$this->rcopy ( "$src/$file", "$dst/$file" );

		} else if (file_exists ( $src ))
			copy ( $src, $dst );
		$this->deleteDir ( $this->sourceDir );
	}
	public function deleteDir($dirname){
		if(file_exists($dirname)) {
			array_map('unlink', glob("$dirname/*.*"));
			@rmdir($dirname);
		}
	}
	function create_dir($path)
	{
		try {
			if (!is_dir($path)) {
				mkdir($path, 0705, true);
			}
		} catch (Exception $exception) {
			echo $exception->getMessage();
		}
	}
	public function getRandomCode($length){
		$key = '';
		$keys = array_merge(range(0, 9), range('a', 'z'));
		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}
		return $key;
	}
	function get_file_name_without_ext($file_name)
	{
		try {
			$file = new File($file_name);
			$ext = $file->ext();
			$file_name = str_replace("." . $ext, "", $file_name);
			return $file_name;
		} catch (Exception $exception) {
			echo $exception->getMessage();
		}
	}

	public function get_proper_file_name($file_name)
	{
		try {
			$file_name = trim($file_name);
			$search = array(" ", "+", "(", ")");
			$file_name = str_replace($search, '_', $file_name);
			return $file_name;
		} catch (Exception $exception) {
			echo $exception->getMessage();
		}
	}

	public function get_image_resize_height($file, $width)
	{
		try {
			$file_name = $file["name"];
			if (!empty ($file_name)) {
				list($image_width, $image_height, $image_type, $image_attr) = getimagesize($file["tmp_name"]);
				return intval(($image_height * $width) / $image_width);
			}
		} catch (Exception $exception) {
			echo $exception->getMessage();
		}
	}

}
?>

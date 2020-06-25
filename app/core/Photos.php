<?php 
header('Content-Type: text/plain; charset=utf-8');
class Photos
{
	private static $filename;
	
	public static function get_image($photo, $location)
    {
            
		if(isset($_FILES["$photo"]) && $_FILES["$photo"]["error"] == 0)
		{

            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

            self::$filename = $_FILES["$photo"]["name"];

            $filetype = $_FILES["$photo"]["type"];

            $filesize = $_FILES["$photo"]["size"];
        
            // Verify file extension
            $ext = pathinfo(self::$filename, PATHINFO_EXTENSION);             

            if(!array_key_exists($ext, $allowed))
            {
                Errorlogs::showlog('error', 'Please select a valid file format.','alert alert-danger');
                die();
            } 
        
            // Verify file size - 5MB maximum
            
            $maxsize = 5 * 1024 * 1024;

            if($filesize > $maxsize)
            {
                Errorlogs::showlog('error', 'File size is larger than the allowed limit.', 'alert alert-danger');
                die();
            }
        
            // Verify MYME type of the file
			if(in_array($filetype, $allowed))
			{
				
				self::$filename = self::tempnam_sfx($location, ".webp");

                move_uploaded_file($_FILES["$photo"]["tmp_name"], self::$filename); 
                
                return self::$filename;

			} 
			else
			{
                Errorlogs::showlog('error', 'Oops! Something want wrong', 'alert alert-danger');
                die();
			}
		}
		else
		{
            Errorlogs::showlog('error', 'Oops! Something want wrong', 'alert alert-danger');
            die();
        }  
    }

    private static function tempnam_sfx($path, $suffix)
    {
        do {
            $file = $path . "/" . mt_rand() . $suffix;

            $fp = @fopen($file, 'x');
        } while (!$fp);

        fclose($fp);

        return $file;
    }
}

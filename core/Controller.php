<?php 

class Controller extends View
{

    /**
     * @var Views
     */
    // protected $load;

    public function __construct()
    {
        $this->load = new View();
    }

    /**
     * @param $name
     * @return mixed
     * @return renderModel
     */
    protected  function renderModel($name)
    {
        //Session::init();
        $path = 'models'.DS.$name.'_model.php';

        if (file_exists($path))
        {
            require_once 'models'.DS.$name.'_model.php';

            $modeName = $name.'_Model';

            return $this->model = new $modeName();
        }
    }

    /**
     * @return string
     */
    protected function get_timezone()
    {
        date_default_timezone_set('Africa/Accra');// Change to your timezone

        $date = date('Y-m-d');

        $time = date('H:i:s');

        $pac = $date . ' ' . $time;

        return $pac;
    }

    #Random Numbers generator

    /**
     * @param $getNewNumbers
     * @return false|string
     */
    protected function generateRandomNumber($getNewNumbers)
    {
        $upcoming_event_code = uniqid(md5(true));

        $upcoming_event_code = str_shuffle($upcoming_event_code);

        return $upcoming_event_code = substr($upcoming_event_code,20, $getNewNumbers);
    }

    /**
     * @param $data
     * @return string
     */
    protected function validate($data){

        $data = htmlspecialchars($data);

        $data = strip_tags($data);

        $data = trim($data);

        $data = ltrim($data);

        return $data;
    }

    /**
     * Generate Random Color Code
     */

    protected function generate_color()
    {
        mt_srand((float) microtime() * 1000000);

        $color_code = '';

        while (strlen($color_code) < 6)
        {
            $color_code .= sprintf("%02X", mt_rand(0, 255));
        }
        return '#' . $color_code;
    }
}

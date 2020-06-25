<?php 
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Calling the model class
     */
    private function getmodel()
    {
        return $this->renderModel('Home');
    }

    private function session()
    {
       return Sessions::get('user_id');
    }

    #index

    public function indexCiti()
    {
        $data=['title'=>'Home'];

        $this->load->renderView('pages/index', $data);
    }

}
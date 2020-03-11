<?php
require 'core/DB.class.php';
require 'rules/opreation.rules.php';
class users implements useropreation
{
    private $query;
    public function __construct()
    {
        $this->query = new DB();
    }
    public function adduser($username, $password, $email)
    {
        $data = array('username'=>$username,'password'=>$password,'email'=>$email);
        $res = $this->query->operation($data,'users','add');
        if($res = 'done')
        {
            return true;
        }
        return false;
    }
    public function updateuser($id ,$username,$password,$email)
    {
       $data = array('username'=>$username,'password'=>$password,'email'=>$email,'conditions'=>array('id'=>$id));
       $res = $this->query->operation($data,'users','update');
       return $res;
    }
    public function search($data)
    {
        $res = $this->query->operation($data,'users','getallbycond','AND');
        return $res;
    }
    public function getall()
    {
        $res = $this->query->operation($data='','users','getall');
        return $res;
    }
    public function login($username, $password)
    {
        $data = array('*',array('username'=>$username,'password'=>$password));
        $res = $this->query->operation($data,'users','getallbycond','AND');
        return $res;
    }
    public function delete($data,$colmun ='')
    {
        if(is_array($data))
        {
           $res = $this->query->operation($data,'users','delete');
           return $res;
        }
        $newdata=[$colmun=>$data];
        $res =$this->query->operation($newdata,'users','delete');
    }
}

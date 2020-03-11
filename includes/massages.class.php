<?php
require 'core/DB.class.php';
class massages
{
    private $query;
    public function __construct()
    {
        $this->query = new DB();
    }
    public function addmassage($title,$content,$name,$email,$user_id)
    {
        $data = array('title'=>$title,'$content'=>$$content,'name'=>$name,'email'=>$email,'user_id'=>$user_id);
        $res = $this->query->operation($data,'massage','add');
        if($res = 'done')
        {
            return true;
        }
        return false;
    }
    public function editmasage($id,$title,$content,$name,$email,$user_id)
    {
        $data = array('title'=>$title,'$content'=>$$content,'name'=>$name,'email'=>$email,'conditions'=>array('id'=>$id,'user_id'=>$user_id));
        $res = $this->query->operation($data,'massage','update');
        return $res;
    }
    public function deletemassage($data ,$colmun ='')
    {
        if(is_array($data))
        {
            $res = $this->query->operation($data,'products','delete');
            return $res;
        }
        $newdata=[$colmun=>$data];
        $res =$this->query->operation($newdata,'products','delete');
    }
    public function getmassage($data)
    {
        $res = $this->query->operation($data,'massage','getallbycond','AND');
        return $res;
    }
    public function getmassages($dataset)
    {
        $data = array('*', $dataset);
        $res = $this->query->operation($data,'massage','getallbycond','AND');
        return $res;
    }
    public function getallmassages()
    {
        $res = $this->query->operation($data='','massage','getallbycond','AND');
        return $res;
    }

}
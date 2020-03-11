<?php
require 'core/DB.class.php';
class products
{
    private $query;
    public function __construct()
    {
        $this->query = new DB();
    }
    public function addproduct($title,$description,$image,$price,$available,$user_id)
    {
        $data = array('title'=>$title,'description'=>$description,'image'=>$image,'price'=>$price,'available'=>$available,'user_id'=>$user_id);
        $res = $this->query->operation($data,'products','add');
        if($res = 'done')
        {
            return true;
        }
        return false;
    }
    public function editproduct($id,$title,$description,$image,$price,$available,$user_id)
    {
        $data = array('title'=>$title,'description'=>$description,'image'=>$image,'price'=>$price,'available'=>$available,'user_id'=>$user_id,'conditions'=>array('id'=>$id));
        $res = $this->query->operation($data,'products','update');
        return $res;
    }
    public function deleteproduct($data ,$colmun ='')
    {
        if(is_array($data))
        {
            $res = $this->query->operation($data,'products','delete');
            return $res;
        }
        $newdata=[$colmun=>$data];
        $res =$this->query->operation($newdata,'products','delete');
    }
    public function getproduct($data)
    {
        $res = $this->query->operation($data,'products','getallbycond','AND');
        return $res;
    }
    public function getproucts($dataset)
    {
        $data = array('*', array('id'=>$dataset));
        $res = $this->query->operation($data,'products','getallbycond','AND');
        return $res;
    }
    public function getallproducts($extra)
    {
        $res = $this->query->operation($data='*','products','getall',$extra);
        return $res;
    }
}
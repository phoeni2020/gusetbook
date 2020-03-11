<?php

interface useropreation
{
    public function adduser($username , $password ,$email);
    public function updateuser($id,$username , $password ,$email);
    public function search($data);
    public function login($username , $email);
    public function delete($array);
}
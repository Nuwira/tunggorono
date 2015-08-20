<?php namespace App\Interfaces;

// Interface
interface BasicInterface {

    public function index();
    public function info($id);
    public function add();
    public function edit($id);
    public function save();
    public function delete($id);

}
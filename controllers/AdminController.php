<?php
class AdminController {
    public function index ($page){
        include('views/'.$page.'.php');
    }
}
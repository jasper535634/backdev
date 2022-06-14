<?php 
require_once 'model/dataHandler.php';

class contentsLogic{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost","mysql","mvc","root","");
        $this->Output = new output();
    }
    public function __destruct()
    {
        
    }
    public function readContent($id){
            $sql = "SELECT author, title, content, socialmedia, images, date FROM contents WHERE id=" .$id;
            $result = $this->DataHandler->readsData($sql);
            $res = $result->fetchAll();
            $images = $this->readImages($res[0]['images']);
            return [$res,$images];
        }

    public function readAllContents(){
        $sql = "SELECT id, author, title, date FROM contents";
        $res = $this->DataHandler->readsData($sql);
        return $res;
    }
    public function readImages($id)
    {
        $container = [];

        $images = explode("," , $id);
        foreach($images as $imageId)
        {
        

        $sql = "SELECT * FROM images WHERE id=" .$imageId;
        $result = $this->DataHandler->readsData($sql);
        $image_res = $result->fetchAll(); ?>
        
        <!-- <pre><?php //var_dump($image_res);?></pre>
        <p>---------------------------------------------------------------------------------------------------------------------</p> -->
        <?php
            foreach($image_res as $strings => $val)
            {
                foreach($val as $imageName){

                    ?>
                    <!-- <pre><?php //var_dump($imageName); ?></pre><p>|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||</p> -->
                    <?php

                    if(is_string($imageName)){
                        array_push($container, $imageName);
                    }
              }
            }
        }
        return $container;  
        }
        public function createContent(){
            
        }
}


?>

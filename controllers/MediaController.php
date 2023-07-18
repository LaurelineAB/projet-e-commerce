<?php
class MediaController extends AbstratcController {
    
    public function __construct()
    {
        $this->manager = new MediaManager();
    }
    
    public function add(){
        
    
        if(!empty($_POST['submit-new-media']))
        {
            if(!empty($_POST['name']))
            {
                $name = $_POST['name'];
            }
            if(!empty($_POST['url']))
            {
                $url = $_POST['url'];
            }
            
            $media = $this->manager->getMediaByName($name);
            if ($media === null)
            {
                $media = $this->manager->insertMedia(new Media($name, $url));
                
                //Render à rajouter 
            }
        }
        
    }
    
    public function edit(){
        
        if(!empty($_POST['submit-edit-media']))
        {
            if(!empty($_POST['name']))
            {
                $name = $_POST['name'];
            }
            if(!empty($_POST['url']))
            {
                $url = $_POST['url'];
            }
            
            $media = $this->manager->getMediaByName($name);
            
            if ($media === $media)
            {
                $media = $this->manager->editMedia($name, $url);
                
                //Render à rajouter 
            }
        }
    }
}
?>
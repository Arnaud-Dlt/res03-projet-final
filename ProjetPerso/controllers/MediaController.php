<?php

class MediaController extends AbstractController{
    private MediaManager $mediaManager;
    
    public function __construct()
    {
        $this->mediaManager = new MediaManager();
    }
    
    // mediaS
    
    public function showMedias()
    {
        // get all the medias from the manager
        $medias=$this->mm->getAllMedias();
        // render
        
        $mediasTab = [];
        foreach($medias as $media){
            $mediaTab=$media->toArray();
            $mediasTab[]=$mediaTab;
        }
        $this->render($mediasTab);
    }
    
    public function createmedia(array $post)
    {
        // create the media in the manager
        $media=new Media(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
         // get the media from the manager
        $createMedia = $this->mm->createmedia($media);
        // render the created media
        $createMediaTab = $createmedia->toArray();
        
        $this->render($createmediaTab);
    }

    public function updateMedia(array $post)
    {
        // update the media in the manager
        $media=new media(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
        $updateMedia = $this->mm->updateMedia($media);
        $updateMediaTab = $updateMedia->toArray();
        
        $this->render($updateMediaTab);
        // render the updated media
    }

    public function deleteMedia(array $post)
    {
        // delete the media in the manager
        $deleteMedia=new media(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
        $deleteMedia = $this->mm->deleteMedia($deleteMedia);
        $deleteMediaTab = $deleteMedia->toArray();
        
        $this->render($updateMediaTab);
        // render the list of all medias
    }
}


?>
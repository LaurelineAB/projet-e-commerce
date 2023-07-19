<?php

class MediaManager extends AbstractManager {
    
    public function getMediaByName(): ? Media
    {
        //Prepare query
        $query = $this->db->prepare("SELECT * FROM medias WHERE name = :name");
        
        //Bind the parameters
        $parameters = [
                'name' => $name
            ];
        //Execute the query
        $query->execute($parameters);
        //Fetch the result
        $result = $query->fetch(PDO::FETCH_ASSOC);
        // If the result is not empty, create a Media object and return it.
        if ($result !== false)
        {
            $media =new Media($result['name'], $result['url']);
            $media->setId($result['id']);
            return $media;
        }
        // Otherwise,return null
        return null;
    }
    //Push new media in the database
    public function insertMedia(Media $media) : ? Media
    {
        //Prepare query
        $query = $this->db->prepare("INSERT INTO medias (name, url) VALUES (:name,:url)"); 
        //Bind the parameters
        $parameters = [
            'name' => $media->getName(),
            'url' => $media->getUrl()
        ];
        //Execute the query
        $query->execute($parameters);
        //Get the id of the newly inserted media
        $media->setId($this->db->lastInsertId());
        
        //Return the media 
        return $media;
    }
    
    //Update media with new data
    public function editMedia(Media $media): ? Media
    {
        //Prepare query
        $query = $this->db->prepare("UPDATE medias SET name = :name AND description = :description WHERE id = :id");
        //Bind the parameters
        $parameters = [
                'id' => $media->getId(),
                'name' => $media->getUsername(),
                'description' => $media->getDescription(),
            ];
        $query->execute($parameters);
        // I'm not sure if the function work :/
    }
    
    
}

?>
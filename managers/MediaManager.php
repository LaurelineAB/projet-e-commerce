<?php

class MediaManager extends AbstractManager {
    
    public function getMediaByName(): ? Media
    {
        $query = $this->db->prepare("SELECT * FROM medias WHERE name = :name");
        $parameters = [
                'name' => $name
            ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($result !== false)
        {
            $media =new Media($result['name'], $result['url']);
            $media->setId($result['id']);
            return $media;
        }
        
        return null;
    }
    
    public function insertMedia(Media $name, Media $url) : ? Media
    {
       $query = $this->db->prepare("INSERT INTO medias (name, url) VALUES (:name, :url)"); 
    }  $parameters = [
            'name' = $name,
            'url' = $url
        ];
        $query->execute($parameters);
        $media->setId($this->db->lastInsertId());
        return $media;

}

?>
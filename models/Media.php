<?php
    class Media {
        private ?int $id;
        private string $name;
        private string $url;
        private int $product_id;
        
        public function __contruct(string $name, string $url, int $product_id)
        {
            $this->id = null;
            $this->name = $name;
            $this->url = $url;
            $this->product_id = $product_id;
        }
        
        public function getId() :? int
        {
            return $this->id;
        }
        public function setId(string $id) : void
        {
            $this->id = $id;
        }
        
        public function getName() :string
        {
            return $this->name;
        }
        public function setName(string $name) : void
        {
            $this->name = $name;
        }
        
        public function getUrl() :string
        {
            return $this->url;
        }
        public function setUrl(string $url) : void
        {
            $this->url = $url;
        }
        
        public function getProduct_id() :string
        {
            return $this->product_id;
        }
        public function setProduct_id(string $product_id) : void
        {
            $this->product_id = $product_id;
        }
    }
?>
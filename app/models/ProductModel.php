<?php

class ProductModel {
    private $Id;
    private $Name;
    private $Description;
    private $Price;
    private $Image;

    // Constructor để khởi tạo đối tượng ProductModel
    public function __construct($Id, $Name, $Description, $Price, $Image)
    {
        $this->Id = $Id;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Image = $Image;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function getImage()  // Sửa lỗi chính tả ở đây
    {
        return $this->Image;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;
    }
}
?>

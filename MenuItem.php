<?php
/**
 * Created by PhpStorm.
 * User: tarajano
 * Date: 05/04/18
 * Time: 11:38 AM
 */

class MenuItem
{
    private $itemName, $itemDescription, $itemPrice, $itemImgSrc, $itemImgAlt, $itemImgTitle;

    public function getItemImgSrc()
    {
        return $this->itemImgSrc;
    }

    public function setItemImgSrc($itemImgSrc)
    {
        $this->itemImgSrc = $itemImgSrc;
    }

    public function getItemImgAlt()
    {
        return $this->itemImgAlt;
    }

    public function setItemImgAlt($itemImgAlt)
    {
        $this->itemImgAlt = $itemImgAlt;
    }

    public function getItemImgTitle()
    {
        return $this->itemImgTitle;
    }

    public function setItemImgTitle($itemImgTitle)
    {
        $this->itemImgTitle = $itemImgTitle;
    }

    public function getItemName()
    {
        return $this->itemName;
    }

    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    public function setItemDescription($itemDescription)
    {
        $this->itemDescription = $itemDescription;
    }

    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    public function __construct($name, $desc, $price, $imgSrc, $imgAlt, $imgTitle)
    {
        $this->itemName = $name;
        $this->itemImgAlt = $imgAlt;
        $this->itemImgTitle = $imgTitle;
        $this->itemDescription = $desc;
        $this->itemImgSrc = $imgSrc;
        $this->itemPrice = $price;
    }

    public function __destruct()
    {
        $this->itemName;
        $this->itemImgAlt;
        $this->itemImgTitle;
        $this->itemDescription;
        $this->itemImgSrc;
        $this->itemPrice;
    }

}
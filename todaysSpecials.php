<?php
/**
 * Created by PhpStorm.
 * User: tarajano
 * Date: 05/04/18
 * Time: 12:23 PM
 */
    include('MenuItem.php');

    function echoTodaysSpecials(){

        $specialsArray = array(
            new MenuItem("The WP Burger", "Freshly made all-beef patt y served up with homefries",
                "14","images/burger_small.jpg","Burger","Monday's Special - Burger"),
            new MenuItem("WP Kebobs", "Tender cuts of beef and chicken, served with your choice of side",
                "17","images/kebobs.jpg","Kebobs","WP Kebobs")
        );
        $specialsItemStringFormat = '<hr><img src="%s" alt="%s" title="%s"><h3>%s</h3><p>%s - $%d</p><hr>';

        $dayOfTheWeek = date("l");
        echo '<aside><h2>'.$dayOfTheWeek.'\'s Specials</h2>';

        foreach ($specialsArray as $specialItem){
            echo sprintf($specialsItemStringFormat,
                $specialItem->getItemImgSrc(),
                $specialItem->getItemImgAlt(),
                $specialItem->getItemImgTitle(),
                $specialItem->getItemName(),
                $specialItem->getItemDescription(),
                $specialItem->getItemPrice());
        }

        echo '</aside>';
    }

?>
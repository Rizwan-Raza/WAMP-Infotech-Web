<?php

function getWork($url) {
    $tag = null;
    switch($url) {
        case "web-design":
        case "website-development":
        case "web-maintenance":
        $tag = "web";
        break;
        case "social-media-optimization":
        $tag = "promo";
        break;
        default: 
        $tag = null;
    }
    if($tag != null) {
        require_once "includes/fetcher.php";
        // $works = getJson("./data/our-works.json", "our_works");
        $works = array_filter(getJson("./data/our-works.json", "our_works"), function($value) use ($tag){
            return $value['tag'] == $tag;
        });
        if(count($works) > 0) {
            $string = '<div class="carousel">';
            foreach
            ($works as $work) { 
                extract($work, EXTR_OVERWRITE);
            
                    $string .= '<div class="carousel-item"><img src="'.$src.'" alt="'.$title.'" class="materialboxed w-full" /></div>';
            }
            $string .= '</div>';
            return $string;
        }
    }
}
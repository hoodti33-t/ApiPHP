<?php
include 'SQLManager.php';

class API{
    public static function outputVideo($businessID, $recipeID){
        $name = SQLManager::getFoodName($recipeID)["row_names"];
        $YTUrl = self::search($businessID, $recipeID, $name);
        echo "<iframe width=\"560\" height=\"315\" src=\"$YTUrl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
    }

    public static function search($businessID, $recipeID, $name){
        $result = SQLManager::getVideo($recipeID);
        if (!$result){ //Not contained in DB
            $api = self::searchAPI($name); //Search YT API
            $youtubeID = $api->id->videoId;
            SQLManager::insert($businessID, $recipeID, "https://www.youtube.com/embed/$youtubeID"); //Insert into DB
            return "https://www.youtube.com/embed/$youtubeID";
        }
        else{ //Found in DB
            return $result["youtubeVideo"];
        }
    }

    public static function getVideoID($businessID, $recipeID, $name){
        $result = SQLManager::getVideo($recipeID);
        if (!$result){ //Not contained in DB
            $api = self::searchAPI($name); //Search YT API
            $youtubeID = $api->id->videoId;
            SQLManager::insert($businessID, $recipeID, "https://www.youtube.com/embed/$youtubeID"); //Insert into DB
            return "https://www.youtube.com/embed/$youtubeID";
        }
        else{ //Found in DB
            return $result["youtubeVideo"];
        }
    }

    public static function searchAPI($topic){
        $topic = str_replace(' ', '+', $topic);
        $topic = "How+to+make+$topic";
        $key = "AIzaSyAQy82EAorkbvZLmrVt1EWCIRxs7au-14k";
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$topic&type=video&key=$key";
        $json = file_get_contents($url);
        $obj = json_decode($json);
        return $obj->items[0];
    }
}

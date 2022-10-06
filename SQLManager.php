<?php

class SQLManager
{

    const SERVER_NAME = "sql5.freemysqlhosting.net";
    const USERNAME = "sql5476951";
    const PASSWORD = "imnkJpmp4H";
    const DB = "sql5476951";

    /**
     * Creates a connection to the AWS database
     * @return mysqli|void
     */
    public static function createConn(){
        $conn = new mysqli(self::SERVER_NAME, self::USERNAME, self::PASSWORD, self::DB);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    /**
     * Gets the video of the requested food, returns false if none found.
     * @param $id
     * @return array|false|null
     */
    public static function getVideo($id){
        $conn = self::createConn();
        $stmt = $conn->prepare("SELECT youtubeVideo FROM menu WHERE idRecipe=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        else{
            return false;
        }
    }

    /**
     * Inserts new YouTube video into DB
     * @param $businessID
     * @param $recipeID
     * @param $youtubeVideo
     * @return bool|mysqli_result
     */
    public static function insert($businessID, $recipeID, $youtubeVideo){
        $conn = self::createConn(); //Open new connection
        //Check to see if exists first
        $stmt = $conn->prepare("SELECT youtubeVideo FROM menu WHERE idBusiness=? AND idRecipe=?");
        $stmt->bind_param("ss", $businessID, $recipeID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $conn->close(); //Close the connection, save resources
            return false; //Duplicate found
        }
        else{
            $stmt = $conn->prepare("INSERT INTO menu (idMenu, idBusiness, idRecipe, youtubeVideo) VALUES(NULL, ?, ?, ?)");
            $stmt->bind_param("sss", $businessID, $recipeID, $youtubeVideo);
            $result = $stmt->execute();
            $conn->close(); //Close the connection, save resources
            return $result;
        }
    }

    public static function getFoodName($recipeID){
        $conn = self::createConn();
        $stmt = $conn->prepare("SELECT row_names FROM Spoonacular WHERE ID=?");
        $stmt->bind_param("s", $recipeID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        else{
            return false;
        }
    }


}
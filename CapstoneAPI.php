<?php
include 'SQLManager.php';
$businessID = $_GET['business'];
$recipeID = $_GET['recipe'];
$name = SQLManager::getFoodName($recipeID)["row_names"];
$YTUrl = search($businessID, $recipeID, $name);
echo "<br><br><hr>Search was for $name<br>";
echo "Here is the link $YTUrl";

echo "<iframe width=\"560\" height=\"315\" src=\"$YTUrl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";

function search($businessID, $recipeID, $name){
    $result = SQLManager::getVideo($recipeID);
    if (!$result){ //Not contained in DB
        $api = searchAPI($name); //Search YT API
        $youtubeID = $api->id->videoId;
        SQLManager::insert($businessID, $recipeID, "https://www.youtube.com/embed/$youtubeID"); //Insert into DB
        return "https://www.youtube.com/embed/$youtubeID";
    }
    else{ //Found in DB
        return $result["youtubeVideo"];
    }
}

function getVideoID($businessID, $recipeID, $name){
    $result = SQLManager::getVideo($recipeID);
    if (!$result){ //Not contained in DB
        $api = searchAPI($name); //Search YT API
        $youtubeID = $api->id->videoId;
        SQLManager::insert($businessID, $recipeID, "https://www.youtube.com/embed/$youtubeID"); //Insert into DB
        return "https://www.youtube.com/embed/$youtubeID";
    }
    else{ //Found in DB
        return $result["youtubeVideo"];
    }
}

function searchAPI($topic){
    $topic = str_replace(' ', '+', $topic);
    $topic = "How+to+make+$topic";
    $key = "AIzaSyAQy82EAorkbvZLmrVt1EWCIRxs7au-14k";
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$topic&type=video&key=$key";
    $json = file_get_contents($url);
    $obj = json_decode($json);
    return $obj->items[0];
}

/*
 * {
    "kind": "youtube#searchListResponse",
    "etag": "82i44way-IsIu5VVKN8l16HO9nw",
    "nextPageToken": "CAUQAA",
    "regionCode": "US",
    "pageInfo": {
        "totalResults": 1000000,
        "resultsPerPage": 5
    },
    "items": [
        {
            "kind": "youtube#searchResult",
            "etag": "aQJX6nesUBrSQcQrqqRFWT6iGv4",
            "id": {
                "kind": "youtube#video",
                "videoId": "TE66McLMMEw"
            },
            "snippet": {
                "publishedAt": "2020-05-01T19:32:24Z",
                "channelId": "UCvjXo25nY-WMCTEXZZb0xsw",
                "title": "YouTube Data API v3 Tutorial",
                "description": "MY RESOURCES: Support the Channel: https://streamlabs.com/ansondevacademy/tip Buy Me a Ko-fi: http://ko-fi.com/anson ...",
                "thumbnails": {
                    "default": {
                        "url": "https://i.ytimg.com/vi/TE66McLMMEw/default.jpg",
                        "width": 120,
                        "height": 90
                    },
                    "medium": {
                        "url": "https://i.ytimg.com/vi/TE66McLMMEw/mqdefault.jpg",
                        "width": 320,
                        "height": 180
                    },
                    "high": {
                        "url": "https://i.ytimg.com/vi/TE66McLMMEw/hqdefault.jpg",
                        "width": 480,
                        "height": 360
                    }
                },
                "channelTitle": "Anson the Developer",
                "liveBroadcastContent": "none",
                "publishTime": "2020-05-01T19:32:24Z"
            }
        },
        {
            "kind": "youtube#searchResult",
            "etag": "44xECNe6tmLVC9QpGAKi4vQfcPc",
            "id": {
                "kind": "youtube#video",
                "videoId": "5qtC-tsQ-wE"
            },
            "snippet": {
                "publishedAt": "2020-02-23T11:59:11Z",
                "channelId": "UCbXgNpp0jedKWcQiULLbDTA",
                "title": "YouTube Data API Tutorial with Python - Analyze Channel Statistics - Part 1",
                "description": "In this Python Tutorial we will be learning how to work with the YouTube Data API and analyze channel statistics. This is going to ...",
                "thumbnails": {
                    "default": {
                        "url": "https://i.ytimg.com/vi/5qtC-tsQ-wE/default.jpg",
                        "width": 120,
                        "height": 90
                    },
                    "medium": {
                        "url": "https://i.ytimg.com/vi/5qtC-tsQ-wE/mqdefault.jpg",
                        "width": 320,
                        "height": 180
                    },
                    "high": {
                        "url": "https://i.ytimg.com/vi/5qtC-tsQ-wE/hqdefault.jpg",
                        "width": 480,
                        "height": 360
                    }
                },
                "channelTitle": "Python Engineer",
                "liveBroadcastContent": "none",
                "publishTime": "2020-02-23T11:59:11Z"
            }
        },
        {
            "kind": "youtube#searchResult",
            "etag": "4TUIZJmVp60Er1w4lim-g_jaCag",
            "id": {
                "kind": "youtube#video",
                "videoId": "th5_9woFJmk"
            },
            "snippet": {
                "publishedAt": "2020-05-29T16:17:07Z",
                "channelId": "UCCezIgC97PvUuR4_gbFUs5g",
                "title": "Python YouTube API Tutorial: Getting Started - Creating an API Key and Querying the API",
                "description": "In this Python Programming Tutorial, we'll be learning how to use the YouTube API. We will learn how to create an API Key and ...",
                "thumbnails": {
                    "default": {
                        "url": "https://i.ytimg.com/vi/th5_9woFJmk/default.jpg",
                        "width": 120,
                        "height": 90
                    },
                    "medium": {
                        "url": "https://i.ytimg.com/vi/th5_9woFJmk/mqdefault.jpg",
                        "width": 320,
                        "height": 180
                    },
                    "high": {
                        "url": "https://i.ytimg.com/vi/th5_9woFJmk/hqdefault.jpg",
                        "width": 480,
                        "height": 360
                    }
                },
                "channelTitle": "Corey Schafer",
                "liveBroadcastContent": "none",
                "publishTime": "2020-05-29T16:17:07Z"
            }
        },
        {
            "kind": "youtube#searchResult",
            "etag": "G1QZnRZep3SLlYjRlRZ9fHOKt70",
            "id": {
                "kind": "youtube#video",
                "videoId": "-QMg39gK624"
            },
            "snippet": {
                "publishedAt": "2018-09-26T10:26:38Z",
                "channelId": "UCkUq-s6z57uJFUFBvZIVTyg",
                "title": "Getting Started with YouTube Data API | Exploring YouTube Data API (Part-1)",
                "description": "Explore the awesome YouTube Data API using Python! In this video, you will learn how to setup your project to use YouTube Data ...",
                "thumbnails": {
                    "default": {
                        "url": "https://i.ytimg.com/vi/-QMg39gK624/default.jpg",
                        "width": 120,
                        "height": 90
                    },
                    "medium": {
                        "url": "https://i.ytimg.com/vi/-QMg39gK624/mqdefault.jpg",
                        "width": 320,
                        "height": 180
                    },
                    "high": {
                        "url": "https://i.ytimg.com/vi/-QMg39gK624/hqdefault.jpg",
                        "width": 480,
                        "height": 360
                    }
                },
                "channelTitle": "Indian Pythonista",
                "liveBroadcastContent": "none",
                "publishTime": "2018-09-26T10:26:38Z"
            }
        },
        {
            "kind": "youtube#searchResult",
            "etag": "BLu4eu1ZIIH9R9S6SfSchS30Vtk",
            "id": {
                "kind": "youtube#video",
                "videoId": "EAyo3_zJj5c"
            },
            "snippet": {
                "publishedAt": "2020-02-02T11:32:27Z",
                "channelId": "UCR6d0EiC3G4WA8-Rqji6a8g",
                "title": "Youtube Data API V3 Video Search Example",
                "description": "Youtube Data API V3 Video Search Example Download the Full Source Code of Advanced Youtube Video Search With ...",
                "thumbnails": {
                    "default": {
                        "url": "https://i.ytimg.com/vi/EAyo3_zJj5c/default.jpg",
                        "width": 120,
                        "height": 90
                    },
                    "medium": {
                        "url": "https://i.ytimg.com/vi/EAyo3_zJj5c/mqdefault.jpg",
                        "width": 320,
                        "height": 180
                    },
                    "high": {
                        "url": "https://i.ytimg.com/vi/EAyo3_zJj5c/hqdefault.jpg",
                        "width": 480,
                        "height": 360
                    }
                },
                "channelTitle": "Coding Shiksha",
                "liveBroadcastContent": "none",
                "publishTime": "2020-02-02T11:32:27Z"
            }
        }
    ]
}
 */
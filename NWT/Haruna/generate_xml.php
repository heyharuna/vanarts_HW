<?php
    if(isset($_GET["submit"])) {
        // create new file
        $xmlfile = simplexml_load_file("xml/classInfo.xml");

        // add new mainElement
        $addNewClass = $xmlfile->addChild("class");

        // add new childElements
        $addNewClass->addChild("title", $_GET["newTitle"]);
        $addNewClass->addChild("instructor", $_GET["newInstructor"]);
        $addNewClass->addChild("day", $_GET["newDay"]);
        $addNewClass->addChild("hours", $_GET["newHour"]);
        $addNewClass->addChild("description", $_GET["newDiscription"]);

        // overwrite new xml data
        $xmlfile->asXML("xml/classInfo.xml");

        // if success uploading new xml data, go to index.php
        if($xmlfile) {
            echo "<script>window.location.replace('index.php')</script>";
            echo "<script>window.location.reload(true)</script>";
        }
    }
    else {
        echo "<script>window.location.replace('index.php')</script>";
    }
?>

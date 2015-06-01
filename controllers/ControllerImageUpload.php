<?php namespace webshop\controllers;

/**
 * Created by PhpStorm.
 * User: wouth_000
 * Date: 27/05/2015
 * Time: 15:03
 */
class ControllerImageUpload implements ControllerInterface
{

    function index($bloggerID)
    {
        // TODO: Implement index() method.
    }

    function show($id)
    {
        // TODO: Implement show() method.
    }

    function create()
    {
        $target_dir = "resources/img";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }

    function store($id)
    {
        // TODO: Implement store() method.
    }

    function update($id)
    {
        // TODO: Implement update() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

    function manage($id)
    {
        // TODO: Implement manage() method.
    }
}
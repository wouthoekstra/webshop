<?php namespace webshop\repos;
/**
 * Created by PhpStorm.
 * User: TrainingUser
 * Date: 19-5-2015
 * Time: 13:53
 */

spl_autoload_register(function ($class) {
    include $class . '.php';
});

class RepoPost extends DatabaseBlog implements DatabaseInterface
{
    public function show($id)
    {
        $this->connect();

        $query = $this->prepare("SELECT * FROM posts WHERE id = ?");
        $query->bind_param("s", $id);
        $query->execute();
        $result = $query->get_result();
        $post = null;
        if ($row = $result->fetch_assoc()) {
            $post = new ModelPost();
            $post->id = $row['id'];
            $post->bloggerID = $row['blogger_id'];
            $post->title = $row['title'];
            $post->content = $row['content'];
            $post->dateCreated = $row['date_created'];
            $post->dateEdited = $row['date_edited'];
        }

        $this->disconnect();
        return $post;
    }

    public function save(&$post)
    {
        if ($post->id == null) {
            $this->store($post);
        } else {
            $this->update($post);
        }
    }

    public function store(&$post)
    {
        $this->connect();
        $dateTime = date("Y-m-d H:m:s", time());
        $query = $this->prepare("INSERT INTO posts (title,content,blogger_id,date_created) VALUES (?,?,?,?)");
        $query->bind_param("ssis", $post->title, $post->content, $post->bloggerID, $dateTime);
        $query->execute();
        $post->id = $this->getInsertId();
        $post->dateCreated = $dateTime;
        $this->disconnect();
    }

    public function update(&$post)
    {
        $this->connect();
        $dateTime = date("Y-m-d H:m:s", time());
        $query = $this->prepare("UPDATE posts SET title=?,content=?,date_edited=? WHERE id = ?");
        $query->bind_param("sssi", $post->title, $post->content, $dateTime, $post->id);
        $query->execute();
        $post->dateEdited = $dateTime;
        $this->disconnect();
    }

    public function delete($id)
    {
        $this->connect();
        $query = $this->prepare("DELETE FROM posts WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execure();
        $this->disconnect();
    }

    public function all()
    {
        $this->connect();

        $query = $this->prepare("SELECT * FROM posts ORDER BY date_created DESC");
        $query->execute();
        $result = $query->get_result();

        $posts = array();
        while ($row = $result->fetch_assoc()) {
            $post = new ModelPost();
            $post->id = $row['id'];
            $post->bloggerID = $row['blogger_id'];
            $post->title = $row['title'];
            $post->content = $row['content'];
            $post->dateCreated = $row['date_created'];
            $post->dateEdited = $row['date_edited'];

            $posts[] = $post;
        }

        $this->disconnect();
        return $posts;
    }

    public function allByBlogger($bloggerID)
    {
        $this->connect();

        $query = $this->prepare("SELECT * FROM posts WHERE blogger_id = ? ORDER BY date_created DESC");
        $query->bind_param("s", $bloggerID);
        $query->execute();
        $result = $query->get_result();

        $posts = array();
        while ($row = $result->fetch_assoc()) {
            $post = new ModelPost();
            $post->id = $row['id'];
            $post->bloggerID = $row['blogger_id'];
            $post->title = $row['title'];
            $post->content = $row['content'];
            $post->dateCreated = $row['date_created'];
            $post->dateEdited = $row['date_edited'];

            $posts[] = $post;
        }

        $this->disconnect();
        return $posts;
    }

    public function byID($id)
    {

    }

}

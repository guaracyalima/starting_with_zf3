<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 24/04/2018
 * Time: 13:24
 */

namespace Blog\Model;


class Post
{
    public $id;
    public $title;
    public $content;

    public function exchangeArray(array $data)
    {
        $this->id =  (!empty($data['id'])) ? $data['id'] : null;
        $this->title =  (!empty($data['title'])) ? $data['title'] : null;
        $this->content =  (!empty($data['content'])) ? $data['content'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 24/04/2018
 * Time: 13:28
 */

namespace Blog\Model;


use Zend\Db\TableGateway\TableGatewayInterface;

class PostTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function save(Post $post)
    {
        $data = [
          'title' => $post->title,
          'content' => $post->content
        ];

        $id = (int) $post->id ;
        if($id === 0)
        {
            $this->tableGateway->insert($data);
            return;
        }

        //valida pra ver se o ID existe
        if(!$this->find($id))
        {
            throw new \RuntimeException(sprintf(
                'Cloud not retrieve the post %d ', $id
            ));
        }

        //se tudo tiver correto atualiza o dado
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function find($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);

        $row = $rowset->current();

        if(!$row){
            throw new \RuntimeException(sprintf(
                'Cloud not retrieve the row %d', $id
            ));
        }

        return $row;
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

    
}
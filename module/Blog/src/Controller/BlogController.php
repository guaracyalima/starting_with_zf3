<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 24/04/2018
 * Time: 12:47
 */

namespace Blog\Controller;


use Blog\Model\PostTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController
{
    /**
     * @var PostTable
     */
    private $table;

    public function __construct(PostTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        $postTable = $this->table;

        return new ViewModel([
            'posts' => $postTable->fetchAll(),
        ]);
    }

    public function addAction()
    {
        return new ViewModel();
    }
}
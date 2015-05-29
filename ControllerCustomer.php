<?php
spl_autoload_register(function($class) {
    include $class . '.php';
});

class ControllerCustomer implements ControllerInterface
{
    private $repoCustomer;

    public function __construct()
    {
        $this->repoCustomer = new RepoCustomer();
    }

    function index($bloggerID)
    {
// TODO: Implement index() method.
    }

    function show($confirm)
    {
        if($confirm==true) {
            include "ViewConfirmOrder.php";
        }

    }

    function create()
    {
        include "ViewWriteCustomer.php";
// TODO: Implement create() method.
    }

    function edit($id)
    {
// TODO: Implement edit() method.
    }

    function store($id)
    {
        if ($_SESSION['logged'])
        {
            $customer = new ModelCustomer();
            $customer->name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $customer->street = htmlspecialchars($_POST['street'], ENT_QUOTES);
            $customer->house_number = htmlspecialchars($_POST['house_number'], ENT_QUOTES);
            $customer->zip = htmlspecialchars($_POST['zip'], ENT_QUOTES);
            $customer->city = htmlspecialchars($_POST['city'], ENT_QUOTES);
            $this->repoCustomer->save($customer);
            header("Location: ?page=customer&action=confirm&id=" . $customer->id);
        } else
        {
            header("Location: 404");
        }
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
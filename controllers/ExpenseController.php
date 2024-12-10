<?php
class ExpenseController extends Controller {
    public function index() {
        $model = $this->loadModel('Expense');
        $expenses = $model->getAll();
        $this->loadView('expenses/index', ['expenses' => $expenses]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = $this->loadModel('Expense');
            $model->add($_POST['title'], $_POST['amount']);
            header('Location: /MVC_EXPENSE/public_html/index.php');
        } else {
            $this->loadView('expenses/add');
        }
    }

    public function delete($var) {
        $id = $var['id'];
        $model = $this->loadModel('Expense');
        $model->delete($id);
        header('Location: /MVC_EXPENSE/public_html/index.php');
    }
}
?>
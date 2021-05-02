<?php


class UserController extends Controller
{
    public $page_restriction = [
        'staff' => [],
        'manager' => ['listUser']
    ];

    public function __construct()
    {
        parent::__construct();
        if (!Helpers::access('manager') && in_array(CTRL, $this->page_restriction['manager'])) {
            Helpers::render('view/errors/errors-403.php', [], [], [], true);
            die();
        }
    }


    /**
     * User login
     */
    public function login()
    {
        if (isset($_POST['login'])) {
            $post = $_POST['login'];
            $user = User::get()->condition('where email = :email and password = :password',
                [':email'=>$post['email'], ':password'=>md5($post['password'])])->all();

            if (count($user)) {
                $_SESSION['user'] = $user[0];
                Helpers::alert('index/index', 'Successfully Login!');
            } else {
                Helpers::render('view/user/login-unlay.php', ['errors'=>'username or password is wrong.'], [], [], true);
            }
        } else {
            Helpers::render('view/user/login-unlay.php', [], [], [], true);
        }
    }


    /**
     * User logout
     */
    public function logout()
    {
        if (Helpers::access()) {
            unset($_SESSION['user']);
        }
        Helpers::alert('user/login', 'Successfully Logout!');
    }


    /**
     * Profile
     */
    public function profile()
    {
        Helpers::render('user/profile');
    }


    /**
     * User list
     */
    public function listUser()
    {
        Helpers::render('user/list_user', ['userlist' => User::get()->all()]);
    }

}
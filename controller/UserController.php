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
            $user = User::get()->condition('where email = :email and password = :password and mode="activated"',
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
        if (isset($_POST['user'])) {
            $post = $_POST['user'];
            $us = User::editProfile($post, $_SESSION['user']['id']);

            if ($us) {
                $_SESSION['user'] = User::get($_SESSION['user']['id'])->one();
                Helpers::alert('user/profile', 'Edited successfully!');
            }
        }

        $errors = '';
        if (isset($_POST['pwd'])) {
            $post = $_POST['pwd'];
            if ($post['password'] != $post['repwd']) {
                $errors = 'The password and confirm password are not match';
                Helpers::render('user/profile');
                exit;
            }
            unset($post['repwd']);
            $us = User::editProfile(['password'=>md5($post['password'])], $_SESSION['user']['id']);

            if ($us) {
                $_SESSION['user'] = User::get($_SESSION['user']['id'])->one();
                Helpers::alert('user/profile', 'Changed Password successfully!');
            }
        }
        Helpers::render('user/profile');
    }


    /**
     * User list
     */
    public function listUser()
    {
        Helpers::render('user/list_user', ['userlist' => User::get()->all()]);
    }


    public function changeHours()
    {
        if (isset($_POST['hours'])) {
            $post = $_POST['hours'];

            $us = User::editProfile(['work_hours' => $post], $_GET['id']);
            $msg = Notification::sendMessage([
                'user_id' => $_GET['id'],
                'message' => 'Your work hours have been changed to ' . $post . ' hours per week.',
                'datetime' => date('Y-m-d H:i')
            ]);
            if ($us && $msg) {
                Helpers::alert('user/listUser', 'Changed Work Hours successfully!');
            }
        }
        Helpers::render('user/change_hours', ['user' => User::get($_GET['id'])->one()]);
    }


    /**
     * setScheduleStatus
     */
    public function setScheduleStatus()
    {
        if (isset($_GET['request'])) {
            $req = $_GET['request'];
            $value = ['status' => $req, 'id' => $_GET['id']];
            $u = '';
            if ($req == 'Accepted') {
                $u = User::setAllocationStatus($value);
            } else if ($req == 'Rejected') {
                $u = User::setAllocationStatus($value);
            }
            if ($u) {
                Helpers::alert('index/index', 'Setting successful!');
            } else {
                Helpers::alert('index/index', 'Setting failed!');
            }
        }
    }


    public function listNotification()
    {
        if (isset($_GET['read'])) {
            $get = $_GET['read'];

            $mark = User::markRead($get);
            if ($mark) {
                Helpers::redirect('user/listNotification');
            }
        }
        $notices = User::getNoteAll();
        Helpers::render('user/notification', ['schedule'=>$notices[0], 'notification'=>$notices[1]]);
    }

    public function createAccount()
    {
        if (isset($_POST['user'])) {
            $post = $_POST['user'];
            $user = User::createAccount($post['email'], md5($post['password']), $post['full_name'], $post['work_hours'], $post['role']);

            if ($user) {
                Helpers::alert('user/listUser', 'Added successfully!');
            } else {
                Helpers::render('user/create_account', ['errors' => 'The email, password, full name or work hours was entered incorrectly.']);
            }
        } else {
            Helpers::render('user/create_account');
        }
    }

    public function activateAccount()
    {
        if (isset($_GET['id'])) {
            $value = ['mode' => 'activated', 'id' => $_GET['id']];
            $us = User::activateAccount($value);
            if ($us) {
                Helpers::alert('user/listUser', 'Activated successfully!');
            }
        }
    }

    public function deactivateAccount()
    {
        if (isset($_GET['id'])) {
            $value = ['mode' => 'deactivated', 'id' => $_GET['id']];
            $us = User::deactivateAccount($value);
            if ($us) {
                Helpers::alert('user/listUser', 'Deactivated successfully!');
            }
        }
    }
}
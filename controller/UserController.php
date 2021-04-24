<?php


class UserController extends Controller
{
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
                Helpers::render('user/login', ['errors'=>'username or password is wrong.']);
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
     * User sign up
     */
    /*public function signup()
    {
        if (isset($_POST['signup'])) {
            if ($this->save($_POST['signup'])) {
                Helpers::alert('index/index', 'Successfully Signup and Login!');
            }
        } else {
            Helpers::render('user/signup');
        }
    }*/


    /**
     * User login
     */
    /*public function login()
    {
        if (isset($_POST['login'])) {
            $post = $_POST['login'];
            $user = User::get()->condition('where username = :username and password = :password',
                [':username'=>$post['username'], ':password'=>md5($post['password'])])->all();
            if (count($user)) {
                $_SESSION['user'] = $user[0];
                Helpers::alert('index/index', 'Successfully Login!');
            } else {
                Helpers::render('user/login', ['errors'=>'username or password is wrong.']);
            }
        } else {
            Helpers::render('user/login');
        }
    }*/


    /*
        public function save($post, $id = null)
        {
            $errors = [];
            foreach ($post as $k => $v) {
                if (in_array($k, User::$required) && $v == '') {
                    $errors[$k] = "'$k' can not be empty.";
                }
            }

            $user = User::get()->condition('where username = :username', [':username'=>$post['username']])->all();
            if (count($user) > 0) {
                $errors['username_repeat'] = 'username is exist';
            }
            if ($post['password'] != $post['cpassword']) {
                $errors['cpassword'] = (isset($errors['cpassword'])?$errors['cpassword']:'') . ' \'comfirm password\' is not correct.';
            }
            if ($post['phone'] != '' && !preg_match('/[0-9]+/', $post['phone'])) {
                $errors['phone'] = ' \'phone\' number must be a number format.';
            }
            if ($post['email'] != '' && !preg_match('/\w+@[a-zA-Z0-9]+[.][a-z]+/', $post['email'])) {
                $errors['email'] = ' \'email\' must be a email format.';
            }

            if (count($errors) > 0) {
                Helpers::render('user/signup', ['data' => $post, 'errors' => $errors]);
                return false;
            }

            if ($id == null) {
                $post['password'] = md5($post['password']);
                unset($post['cpassword']);
                DB::insert(User::$table_name, $post);
                $post['role'] = 1;
                $_SESSION['user'] = $post;
                return true;
            } else {
                DB::update(User::$table_name, $post, 'id = ' . $id);
            }
        }*/
}
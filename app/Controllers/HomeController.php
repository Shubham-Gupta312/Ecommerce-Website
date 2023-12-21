<?php

namespace App\Controllers;

use App\Libraries\Hash;

class HomeController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'help']);
        // helper(['form', 'url', 'help']);
        // test();die;
    }
    public function index(): string
    {
        return view('welcome_message');
    }
    public function register()
    {
        if ($this->request->getMethod() == 'get') {
            //  for show/view the sign-up page
            return view('authentication/register');
        }
        // for submit the registration form
        else if ($this->request->getMethod() == 'post') {
            //    echo 'form submit'; FORM SUBMISSION AND VALIDATION CODE
            $validation = $this->validate([
                // validation rules
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your Name is required'
                    ]

                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Your Email is required',
                        'valid_email' => 'You must enter a valid email'
                    ]

                ],
                'phone' => [
                    'rules' => 'required|integer|max_length[10]',
                    'errors' => [
                        'required' => 'Contact No. is Required',
                        'integer' => 'Your Contact No. must be an integer',
                        'max_length[10]' => 'Your Contact No. must have 10 digits number'
                    ]
                ],
                'password' => [
                    'rules' => 'required|max_length[12]|min_length[6]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 12 characters in length'
                    ]
                ],
                'cpassword' => [
                    'rules' => 'required|min_length[6]|max_length[10]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                        'matches' => 'Your password should be match with entered Password'
                    ]

                ],
            ]);
            if (!$validation) {
                // echo "form not validated! please fill the all details" ;
                return view('authentication/register', ['validation' => $this->validator]);
            } else {
                // echo "form validated! and submit the form;
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $phone = $this->request->getPost('phone');
                $password = $this->request->getPost('password');

                $values = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => Hash::create_hash($password),
                ];
                // sending data to the database
                $registerModel = new \App\Models\RegistrationModel();
                $query = $registerModel->insert($values);
                var_dump($query);
                if (!$query) {
                    // echo "form not submitted";
                    return redirect()->back()->with('fail', 'Something went wrong!');
                } else {
                    // echo 'form submitted';
                    return redirect()->back()->with('success', "Congratulations! You're now a member. <br> Enjoy your Shopping");
                    // return redirect()->to(base_url());
                }
            }

        }
    }
    public function login()
    {
        if ($this->request->getMethod() == 'get') {
            // show the login page
            return view('authentication/login');
        } else if ($this->request->getMethod() == "post") {
            // for submit the data
            $validation = $this->validate([
                // validation rules
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Your Email is required',
                        'valid_email' => 'You must enter a valid email'
                    ]

                ],
                'password' => [
                    'rules' => 'required|max_length[12]|min_length[6]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 6 characters in length',
                        'max_length' => 'Password must not have more that 12 characters in length'
                    ]
                ],
            ]);
            if (!$validation) {
                // echo "form not validated";
                return view('authentication/login', ['validation' => $this->validator]);
            } else {
                // echo"form validated";
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                // fetching data from database of user
                $registerModel = new \App\Models\RegistrationModel();
                // find user data in database
                $user_data = $registerModel->where('email', $email)->first();
                // Hashed password verify with db algorithm in library module
                $check_password = Hash::pass_verify($password, $user_data['password']);
                // check the entered password and db password
                if (!$check_password) {
                    return redirect()->back()->withInput();
                } else {
                    // logged in successfully
                    // return redirect()->to(base_url());
                    // logged in with session data and show data according user or admin
                    if (!is_null($user_data)) {
                        $session_data = [
                            'user_id' => $user_data['id'],
                            'name' => $user_data['name'],
                            'email' => $user_data['email'],
                            'user_type' => $user_data['user_type'],
                            'loggedin' => 'loggedin'
                        ];
                        // filter data from database according to roles and send the user to their destination page 
                        session()->set($session_data);
                        if ($user_data['user_type'] == 'user') {
                            //go to the user page
                            $url = "";
                        } else if ($user_data['user_type'] == "admin") {
                            // go to the admin page/dashboard
                            $url = "admin/admin_dashboard";
                        }
                        return redirect()->to(base_url($url));
                    }
                }
            }
        }
    }
    // logout function
    public function logout()
    {
        session_unset();
        session()->destroy();
        return redirect()->to(base_url());
    }
}

<?php

require 'config/function.php';
// include('admin/code.php');

if (isset($_POST['loginBtn'])) {
    $emailInput = validate($_POST['email']);
    $passwordInput = validate($_POST['password']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

    if ($email != null && $password != null) {
        // $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashPassword = $row['password'];

            if (password_verify($password, $hashPassword)) {
                // Password matches, proceed with login
                $_SESSION['auth'] = true;
                $_SESSION['loggedInUserRole'] = $row['role'];
                $_SESSION['loggedInUser'] = [
                    'name' => $row['name'],
                    'email' => $row['email']
                ];

                if ($row['role'] == 'admin') {
                    if ($row['is_ban'] == 1) {
                        redirect('login.php', 'Your account has been ban please contact to the admin');
                    } else {
                        redirect('admin/index.php', 'Logged In successfully');
                    }
                } else {
                    redirect('home.php', '');
                }
            } else {
                // Invalid password
                redirect('index.php', 'Invalid Password or email');
            }
        } else {
            // Invalid email
            $agentEmail = $_POST['email'];
            $agentPassword = $_POST['password'];
            $agentQuery = "SELECT * FROM agent WHERE email = '$agentEmail' AND password = '$agentPassword'";
            $agentResult = mysqli_query(
                $conn,
                $agentQuery
            );
            $agentRow = mysqli_fetch_assoc($agentResult);
            if (!empty($agentRow)) {
                $_SESSION['is_agent'] = true;
                $_SESSION['auth'] = true;
                $_SESSION['loggedInUserRole'] = 'agent';
                $_SESSION['loggedInUser'] = [
                    'name' => $agentRow['name'],
                    'email' => $agentRow['email']
                ];
                redirect('home.php', 'Logged In successfully');
            } else {
                redirect('index.php', 'Invalid Email or Password');
            }
            redirect('index.php', 'Invalid Email or Password');
        }
    } else {
        // Missing email or password
        redirect('index.php', 'All fields is mandatory');
    }
}
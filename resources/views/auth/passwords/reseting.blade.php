<?php
    // Check for tokens
    $selector = filter_input(INPUT_GET, 'selector');
    $validator = filter_input(INPUT_GET, 'validator');

    if ( false !== ctype_xdigit( $selector ) && false !== ctype_xdigit( $validator ) ) :
    ?>
        <form action="reset_process.php" method="post">
            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
            <input type="password" class="text" name="password" placeholder="Enter your new password" required>
            <input type="submit" class="submit" value="Submit">
        </form>
        <p><a href="index.php">Login here</a></p>
    <?php endif; ?>
    
    <?php
    // Get tokens
    $results = $this->db->get_results("SELECT * FROM password_reset WHERE selector = :selector AND expires >= :time", ['selector'=>$selector,'time'=>time()]);

    if ( empty( $results ) ) {
        return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 002');
    }

    $auth_token = $results[0];
    $calc = hash('sha256', hex2bin($validator));

    // Validate tokens
    if ( hash_equals( $calc, $auth_token->token ) )  {
        $user = $this->user_exists($auth_token->email, 'email');

        if ( false === $user ) {
            return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 003');
        }

        // Update password
        $update = $this->db->update('users', 
            array(
                'password'  =>  password_hash($password, PASSWORD_DEFAULT),
            ), $user->ID
        );

        // Delete any existing password reset AND remember me tokens for this user
        $this->db->delete('password_reset', 'email', $user->email);
        $this->db->delete('auth_tokens', 'username', $user->username);

        if ( $update == true ) {
            // New password. New session.
            session_destroy();

            return array('status'=>1,'message'=>'Password updated successfully. <a href="index.php">Login here</a>');
        }
    }
?>

<?php
// Get tokens
$results = $this->db->get_results("SELECT * FROM password_reset WHERE selector = :selector AND expires >= :time", ['selector'=>$selector,'time'=>time()]);

if ( empty( $results ) ) {
    return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 002');
}

$auth_token = $results[0];
$calc = hash('sha256', hex2bin($validator));

// Validate tokens
if ( hash_equals( $calc, $auth_token->token ) )  {
    $user = $this->user_exists($auth_token->email, 'email');
    
    if ( false === $user ) {
        return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 003');
    }
    
    // Update password
    $update = $this->db->update('users', 
        array(
            'password'  =>  password_hash($password, PASSWORD_DEFAULT),
        ), $user->ID
    );
    
    // Delete any existing password reset AND remember me tokens for this user
    $this->db->delete('password_reset', 'email', $user->email);
    $this->db->delete('auth_tokens', 'username', $user->username);
    
    if ( $update == true ) {
        // New password. New session.
        session_destroy();
    
        return array('status'=>1,'message'=>'Password updated successfully. <a href="index.php">Login here</a>');
    }
}
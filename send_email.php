<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $number = htmlspecialchars(trim($_POST['number']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Email details
    $to = "navdeepravindran@gmail.com"; // Your email address
    $subject = "New Form Submission from $name";
    
    // Create the email content
    $email_body = "You have received a new message from your website form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone Number: $number\n\n";
    $email_body .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";
    
    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        // Redirect to a thank you page or display a success message
        echo "Thank you for your message. It has been sent.";
    } else {
        // Handle errors in sending
        echo "Sorry, there was a problem sending your message. Please try again later.";
    }
} else {
    echo "Invalid request method";
}
?>

<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Construct the email message
  $to = 'kekw0016@gmail.com'; // replace with your email address
  $subject = 'New form submission from ' . $name;
  $message = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
  $headers = 'From: ' . $email;

  // Send the email
  if (mail($to, $subject, $message, $headers)) {
    // Send a success response to the client
    $response = [
      'success' => true,
      'message' => 'Form submitted successfully!'
    ];
  } else {
    // Send an error response if the email failed to send
    $response = [
      'success' => false,
      'message' => 'Failed to send email!'
    ];
  }

  // Send a response to the client
  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  // Send an error response if the request method is not POST
  $response = [
    'success' => false,
    'message' => 'Invalid request method!'
  ];

  header('Content-Type: application/json');
  echo json_encode($response);
}

?>

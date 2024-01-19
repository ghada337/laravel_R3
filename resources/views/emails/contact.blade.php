<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 20px;
            margin: 20px 0;
        }
        .header {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }
        .content {
            line-height: 1.6;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            New Contact Form Submission
        </div>
        <div class="content">
            <p>You have received a new message from the contact form:</p>
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Your Company Name. All Rights Reserved.
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>New Support Ticket Created</title>
</head>
<body>
    <h1>New Ticket Created</h1>
    <p>Dear Admin,</p>
    <p>A new support ticket has been created by {{ $ticket->user->name }}.</p>

    <p><strong>Ticket Subject:</strong> {{ $ticket->subject }}</p>
    <p><strong>Message:</strong> {{ $ticket->message }}</p>

    <p>You can view and respond to the ticket in your admin panel.</p>

    <p>Regards,<br>Support Team</p>
</body>
</html>

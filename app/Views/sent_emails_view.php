<?php // Ensure there is no whitespace or characters before this line ?>

<!DOCTYPE html>
<html>
<head>
    <title>Sent Emails</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Sent Emails</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Recipient</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Sent At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emails as $email): ?>
            <tr>
                <td><?= esc($email['id']) ?></td>
                <td><?= esc($email['mailTo']) ?></td>
                <td><?= esc($email['subject']) ?></td>
                <td><?= esc($email['message']) ?></td>
                <td><?= esc($email['sent_at']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
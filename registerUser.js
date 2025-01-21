// ...existing code...

function sendEmail(user) {
    // Logic to send email
    console.log(`Email sent to ${user.email}`);
}

function sendNotification(user) {
    // Logic to send notification
    console.log(`Notification sent to ${user.username}`);
}

function registerUser(user) {
    // ...existing code...
    sendEmail(user);
    sendNotification(user);
    // ...existing code...
}

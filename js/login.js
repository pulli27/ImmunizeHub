document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Simulate CRUD with localStorage
    let users = JSON.parse(localStorage.getItem('users')) || [];

    // Read (Checking if the user exists)
    const user = users.find(user => user.username === username && user.password === password);

    if (user) {
        alert('Login successful!');
    } else {
        alert('Invalid username or password');
    }

    // Optionally, clear form fields
    document.getElementById('loginForm').reset();
});

// Simulate user creation (registration)
document.getElementById('createAccountBtn').addEventListener('click', function() {
    const username = prompt("Enter your new username:");
    const password = prompt("Enter your new password:");

    let users = JSON.parse(localStorage.getItem('users')) || [];

    // Create
    users.push({ username: username, password: password });
    localStorage.setItem('users', JSON.stringify(users));

    alert('Account created successfully!');
});

// For demonstration: Update (Example - update password)
function updateUserPassword(username, newPassword) {
    let users = JSON.parse(localStorage.getItem('users')) || [];

    const userIndex = users.findIndex(user => user.username === username);
    if (userIndex !== -1) {
        users[userIndex].password = newPassword;
        localStorage.setItem('users', JSON.stringify(users));
        alert('Password updated successfully');
    } else {
        alert('User not found');
    }
}

// For demonstration: Delete (Example - remove user)
function deleteUser(username) {
    let users = JSON.parse(localStorage.getItem('users')) || [];

    const updatedUsers = users.filter(user => user.username !== username);
    localStorage.setItem('users', JSON.stringify(updatedUsers));

    alert('User deleted successfully');
}

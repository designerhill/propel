<?php
    include('header.php');
    $uid = $_SESSION['user'];
    if (!isset($_SESSION['user'])) {
        // Redirect to login page if session is not set
        header("Location: ../login.php");
        exit();
    }

    $query = "
        SELECT 
            p.pid AS pid, 
            p.title AS pname, 
              p.agentname AS aname, 
            u.name AS name, 
            m.message, 
            m.date, 
            m.projectId
        FROM message m
        JOIN user u ON m.sender = u.userid COLLATE utf8mb4_general_ci
        JOIN property p ON m.projectId = p.pid COLLATE utf8mb4_general_ci
        WHERE u.userid = '$uid'
        GROUP BY m.projectId 
        ORDER BY p.pid, m.date 
    ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
<style>
#chat-list {
    width: 30%;
    border-right: 1px solid #ccc;
    padding: 10px;
    overflow-y: auto;
}

#chat-list h2 {
    text-align: center;
}

.user {
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #ccc;
    transition: background 0.3s;
}

.user:hover {
    background: #f0f0f0;
}

#chat-window {
    width: 70%;
    padding: 10px;
    display: none;
    left: 30%;
    top: 0;
    position: static;
    /* Hidden initially */
}

#chat-window h2 {
    text-align: center;
}

#messages {
    height: 400px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
    overflow-y: auto;
}

#message-input {
    display: flex;
}

#message-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#message-input button {
    padding: 10px;
    border: none;
    background: #007BFF;
    color: white;
    border-radius: 4px;
    margin-left: 5px;
    cursor: pointer;
}

#message-input button:hover {
    background: #0056b3;
}
</style>
<section class="myprofile-section sec-pad">
    <div class="container">
        <!-- Sidebar -->


        <div class="main-content">
            <div class="tabs">
                <a href="profile.php" class="tab">Profile</a>
                <a href="my-listing.php" class="tab">My Listings</a>

                <a href="communication.php" class="tab active">Communication</a>


            </div>
            <div class="profile-details">
                <div class="container">
                    <div id="chat-list">
                        <h3>Chats</h3>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="user"
                            onclick="openChat(<?php echo $row['pid']; ?>, '<?php echo $row['aname']; ?>')">
                            <i class="fa fa-user"></i>&nbsp; <b><?php echo $row['pname']; ?></b>
                        </div>
                        <?php } ?>
                    </div>
                    <div id="chat-window">
                        <h4 id="chat-title"></h4>
                        <div id="messages"></div>
                        <div id="message-input">
                            <input type="text" id="message" placeholder="Type your message..." />
                            <button onclick="sendMessage()">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function openChat(pid, aname) {
    document.getElementById('chat-title').innerText = `Chat with ${aname}`;
    document.getElementById('messages').innerHTML = ''; // Clear messages on new chat
    document.getElementById('chat-window').style.display = 'block'; // Show chat window

    // Debug: Log pid and pname being sent
    console.log("Opening chat with PID:", pid, "PName:", aname);

    fetch('fetchmessage', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Set content type
            },
            body: 'pid=' + encodeURIComponent(pid) // Send pid as POST data
        })
        .then(response => response.json()) // Expect a JSON response
        .then(data => {
            // Debug: Log the data received from the server
            console.log("Received data:", data);

            if (data.success) {
                const messagesDiv = document.getElementById('messages');
                if (data.messages && data.messages.length > 0) {
                    data.messages.forEach(message => {
                        const messageDiv = document.createElement('div');
                        messageDiv.innerText =
                            `${message.date} - ${message.sender}: ${message.message}`;
                        messagesDiv.appendChild(messageDiv);
                    });
                } else {
                    messagesDiv.innerHTML = '<p>No messages found.</p>';
                }
            } else {
                console.error('Error fetching messages:', data.error || 'Unknown error');
            }
        })
        .catch(error => {
            console.error('Error with fetch request:', error);
        });
}

function sendMessage() {
    const messageInput = document.getElementById('message');
    const message = messageInput.value;

    const chatTitle = document.getElementById('chat-title').innerText;

    // Extract pname from the format "Chat with {pname}"
    const pname = chatTitle.replace('Chat with ', '');
    const pid = document.querySelector('.user[onclick*="' + pname + '"]').getAttribute('onclick').match(/\d+/)[0];

    if (!pid || message.trim() === '') {
        alert('PID or message is missing.');
        return;
    }

    // Clear the message input field
    messageInput.value = '';

    // Send the message to the backend via a POST request
    fetch('send_message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `pid=${pid}&message=${encodeURIComponent(message)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const messagesDiv = document.getElementById('messages');

                // Display the message
                const newMessage = document.createElement('div');
                newMessage.innerHTML =
                    `<small>${data.date}</small> <strong>${data.username}:</strong> ${message} `;
                messagesDiv.appendChild(newMessage);

                // Scroll to the bottom
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            } else {
                alert('Failed to send the message.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error sending the message.');
        });
}
</script>
<?php include('footer.php'); ?>
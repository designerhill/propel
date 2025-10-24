<?php
require("header.php");
$query = "
SELECT 
    p.pid AS pid, 
    p.title AS pname, 
    p.agentname AS aname, 
    u.name AS name, 
    u.userid AS uid,
    m.message, 
    m.date, 
    m.projectId
FROM message m
JOIN user u ON m.sender = u.userid
JOIN property p ON m.projectId = p.pid where sender!='Agent'
GROUP BY m.projectId,m.sender 
ORDER BY p.pid, m.date ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<style>
.container {
    display: flex;
    /* Enable flexbox */
    width: 100%;
}

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
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-4">Messages</h4>
                        <div class="container">
                            <div id="chat-list">

                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <div class="user"
                                    onclick="openChat(<?php echo $row['pid']; ?>, '<?php echo addslashes($row['name']); ?>', '<?php echo $row['uid']; ?>')">
                                    <i class="fa fa-user"></i>&nbsp;
                                    <b><?php echo htmlspecialchars($row['name']); ?>
                                        (<?php echo htmlspecialchars($row['pname']); ?>)
                                    </b>
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


                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>
</div>
<script>
let currentUid = null; // Track the currently active UID

function openChat(pid, name, uid) {
    console.log(`Opening chat - PID: ${pid}, Name: ${name}, UID: ${uid}`); // Debugging log
    document.getElementById('chat-title').innerText = `Chat with ${name}`;
    document.getElementById('messages').innerHTML = ''; // Clear messages on new chat
    document.getElementById('chat-window').style.display = 'block'; // Show chat window

    // Debugging: Log the data before sending it
    console.log("Sending fetch request with PID: " + pid + " and UID: " + uid);

    fetch('fetchmessage', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Set content type
            },
            body: `pid=${encodeURIComponent(pid)}&uid=${encodeURIComponent(uid)}` // Send both pid and uid
        })
        .then(response => response.json()) // Expect a JSON response
        .then(data => {
            console.log("Received data:", data); // Debugging log
            if (data.success) {
                const messagesDiv = document.getElementById('messages');
                if (data.messages && data.messages.length > 0) {
                    data.messages.forEach(message => {
                        const messageDiv = document.createElement('div');
                        messageDiv.innerText = `${message.date} - ${message.sender}: ${message.message}`;
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
            console.error('Error with fetch request:', error); // Log fetch error
        });
}


function sendMessage() {
    const messageInput = document.getElementById('message');
    const message = messageInput.value.trim();

    // Extract project ID (pid) and receiver name (aname) from the chat title
    const chatTitle = document.getElementById('chat-title').innerText;
    const pid = document.querySelector('.user[onclick*="' + chatTitle.replace('Chat with ', '') + '"]')
        .getAttribute('onclick')
        .match(/\d+/)[0];
    const receiver = chatTitle.replace('Chat with ', ''); // Extract receiver name

    if (!pid || !message) {
        alert('Project ID (PID) or message is missing.');
        return;
    }

    // Clear the message input field
    messageInput.value = '';

    // Send the message to the backend via a POST request
    fetch('send_message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `pid=${encodeURIComponent(pid)}&message=${encodeURIComponent(message)}&username=${encodeURIComponent(receiver)}`
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Debugging: Log server response

            if (data.status === 'success') {
                const messagesDiv = document.getElementById('messages');

                // Display the new message
                const newMessage = document.createElement('div');
                newMessage.innerHTML =
                    `<small>${data.date}</small> <strong>${data.sender}:</strong> ${message}`;
                messagesDiv.appendChild(newMessage);

                // Scroll to the bottom of the messages container
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            } else {
                alert('Failed to send the message: ' + data.message);
            }
        })
        .catch(err => {
            console.error('Fetch error:', err); // Debugging: Log any fetch-related errors
            alert('Error sending the message.');
        });
}
</script>

<?php
include('footer.php');
?>
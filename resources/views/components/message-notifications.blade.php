<link rel="stylesheet" href="{{ asset('css/message-notifications.css') }}">

<div class="chatbot-popup" id="chatbot">
    <div class="chatbot-header">
        <h3>Launch Nest Bot</h3>
        <button class="close-btn" onclick="toggleChat()">&times;</button>
    </div>
    <iframe
        src="https://www.chatbase.co/chatbot-iframe/HKZEZ2rici0R1JCKHTiwa"
        width="100%"
        style="height: 620px; border: none;"
        frameborder="0"
    ></iframe>
    <div class="chat-arrow"></div>
</div>

<div class="chat-wrapper">
    <div class="chat">
        <div class="background">
            <a href="{{ route('messages') }}" class="chat-trigger" onclick="toggleChat(); return false;">
                <img src="{{ asset('images/careerbuddy.png') }}" alt="Open chat" srcset="">
            </a>
        </div>
    </div>
</div>

<style>
.chatbot-popup {
    position: fixed;
    bottom: 145px;
    right: 60px;
    width: 450px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.2);
    display: none;
    z-index: 1000;
}

.chat-arrow {
    position: absolute;
    bottom: -20px;
    right: 20px;
    width: 0;
    height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-top: 20px solid #fff;
    filter: drop-shadow(0 2px 2px rgba(0,0,0,0.1));
}

.chatbot-header {
    padding: 15px;
    background: #2c3e50;
    color: #fff;
    border-radius: 10px 10px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbot-header h3 {
    margin: 0;
    font-size: 16px;
}

.close-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
}

.close-btn:hover {
    opacity: 0.8;
}
</style>

<script>
function toggleChat() {
    const chatbot = document.getElementById('chatbot');
    chatbot.style.display = chatbot.style.display === 'none' ? 'block' : 'none';
}
</script>

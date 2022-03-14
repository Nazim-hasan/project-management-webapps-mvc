// const { default: axios } = require("axios");

require("./bootstrap");
const persons = document.getElementById("persons");
const username_input = document.getElementById("username-name");
const message_input = document.getElementById("massage_input");
const message_form = document.getElementById("message_form");

message_form.addEventListener("submit", function (e) {
    e.preventDefault();
    console.log(username_input);
    let has_errors = false;

    if (message_input.value == "") {
        alert("Please enter a message");
        has_errors = true;
    }
    if (has_errors) {
        return;
    }
    const options = {
        method: "post",
        url: "/send-message",
        data: {
            username: username_input.innerText,
            message: message_input.value,
        },
    };
    axios(options);
});

window.Echo.channel("chat").listen(".message", (e) => {
    console.log(e);

    persons.innerHTML += `
    <li class="chat-left d-block">
    <div class="chat-avatar d-flex">
        <img src="../../dist/img/user1-128x128.jpg" alt="Retail Admin">
        
        <div class="chat-text" id="message-show"><span>${e.message}</span></div>
    </div>
    <div class="chat-name" id="username-name" style="text-align: left;"><p>${e.username}</p></div>
    </li>
    `;
    message_input.value = "";
});

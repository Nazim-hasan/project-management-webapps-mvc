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
    <li class="chat-left" style="display: block;">
    <div class="chat-avatar d-block">
        <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
        <div class="chat-name" id="username-name">${e.username}</div>
    </div>
    <div class="chat-text" id="message-show">${e.message}</div>
    </li>
    `;
});

'use strict';

let ChatApp = React.createClass({
    getInitialState: function () {
        return {
            messages: [],
            socket: window.io('http://localhost:3000')
        }
    },
    componentDidMount: function () {
        let self = this;
        this.state.socket.on('receive-message', function (msg) {
            let messages = self.state.messages;
            messages.push(msg);
            self.setState({messages: messages});
            console.log(self.state.messages);
        });
    },

    submitMessage: function () {
        let message = document.getElementById('message').value;
        this.state.socket.emit('new-message', message);
    },

    render: function () {
        let self = this;
        let messages = self.state.messages.map(function(msg){
            return <li><span id="name">Sam</span>{msg}</li>
        });
        return (
            <div>
                <ul>
                    {messages}
                </ul>
                <input id="message" type="text"/>
                <button id="btn" name='submit' placeholder="Enter your message here." onKeyDown={} onClick={() => self.submitMessage()}>Submit</button>
            </div>
        );
    }

});

window.ReactDOM.render(
    <ChatApp/>
    , document.getElementById('clanChat')
);



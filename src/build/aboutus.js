
var SetAbout = React.createClass({
  displayName: "SetAbout",

  getInitialState: function () {
    return { screen: 1, input_value: null, error: false };
  },
  go_to_screen: function (int) {
    this.setState({ screen: int });
  },
  show_input: function () {
    if (this.state.input_value) {
      this.setState({ screen: 3 });
      this.setState({ error: false });
    } else {
      this.setState({ error: true });
    }
  },
  input_change: function (event) {
    this.setState({ input_value: event.target.value });
    this.setState({ error: false });
  },
  clear_text: function () {
    this.setState({ input_value: null });
    this.go_to_screen(1);
  },
  render: function () {
    var value = this.state.input_value;
    var error = this.state.error;
    switch (this.state.screen) {
      case 1:
        return React.createElement(
          "div",
          null,
          React.createElement(AlertBox, { error: error }),
          React.createElement(
            ReactReorderable,
            null,
            React.createElement(
              "div",
              { className: "draggable-element", onClick: this.show_input },
              React.createElement("i", { className: "fa fa-fort-awesome" }),
              React.createElement(
                "div",
                { className: "draggable-handle" },
                "About Us"
              )
            ),
            React.createElement(InputApp, { error: error, click: this.go_to_screen.bind(this, 2) })
          )
        );
      case 2:
        return React.createElement(
          "div",
          null,
          React.createElement(AlertBox, { error: error }),
          React.createElement(
            "div",
            { className: "InputForAbout" },
            React.createElement("input", { type: "text", value: value, onChange: this.input_change, placeholder: "About Box Text here" }),
            React.createElement(
              "button",
              { onClick: this.go_to_screen.bind(this, 1) },
              "Set"
            )
          )
        );
      case 3:
        return React.createElement(
          "div",
          null,
          React.createElement(AlertBox, { error: error }),
          React.createElement(
            "div",
            { id: "result" },
            value,
            " ",
            React.createElement("p", null),
            React.createElement(
              "button",
              { onClick: this.go_to_screen.bind(this, 1) },
              "Back"
            ),
            React.createElement(
              "button",
              { onClick: this.clear_text },
              "Clear"
            )
          )
        );
    } // switch
  } // render
});

var InputApp = React.createClass({
  displayName: "InputApp",

  render: function () {
    if (this.props.error) {
      return React.createElement(
        "div",
        { className: "draggable-element error", onClick: this.props.click },
        React.createElement("i", { className: "fa fa-pencil-square" }),
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Add Input ",
          this.props.error
        )
      );
    } else {
      return React.createElement(
        "div",
        { className: "draggable-element", onClick: this.props.click },
        React.createElement("i", { className: "fa fa-pencil-square" }),
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Add Input ",
          this.props.error
        )
      );
    }
  }
});

var AlertBox = React.createClass({
  displayName: "AlertBox",

  render: function () {
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes();
    if (this.props.error) {
      return React.createElement(
        "div",
        { className: "taskbar" },
        "Error add an input first."
      );
    } else {
      return React.createElement(
        "div",
        { className: "taskbar" },
        React.createElement(
          "span",
          { id: "task-left" },
          " 4G ",
          React.createElement("i", { className: "fa fa-wifi" })
        ),
        React.createElement(
          "span",
          { id: "task-center" },
          time
        ),
        React.createElement(
          "span",
          { id: "task-right" },
          " 100% ",
          React.createElement("i", { className: "fa fa-battery-full" })
        )
      );
    }
  }
});

ReactDOM.render(React.createElement(SetAbout, null), document.getElementById('apps'));
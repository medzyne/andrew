
var SetAbout = React.createClass({
  getInitialState: function(){
    return { screen : 1, input_value: null, error: false}
  },
  go_to_screen: function(int){
    this.setState({ screen : int });
  },
  show_input: function(){
    if(this.state.input_value){
      this.setState({ screen : 3});
      this.setState({error: false});
  }
  else{
    this.setState({error: true});
  }
},
  input_change: function(event)
  {
    this.setState({input_value: event.target.value});
    this.setState({error: false});
  },
  clear_text: function(){
    this.setState({input_value: null});
    this.go_to_screen(1);
  },
  render: function(){
      var value = this.state.input_value;
      var error = this.state.error;
      switch(this.state.screen){
        case(1):
          return(
            <div>
            <AlertBox error={error}/>
            <ReactReorderable>
            <div className="draggable-element" onClick={this.show_input}>
              <i className="fa fa-fort-awesome"></i>
              <div className="draggable-handle">About Us</div>
            </div>
            <InputApp error={error} click={this.go_to_screen.bind(this, 2)} />
            </ReactReorderable>
            </div>
          );
        case(2):
          return(
            <div>
              <AlertBox error={error}/>
              <div className="InputForAbout">
                <input type="text" value={value} onChange={this.input_change} placeholder="About Box Text here"/>
                <button onClick={this.go_to_screen.bind(this, 1)}>Set</button>
              </div>
            </div>
          )
        case(3):
          return(
            <div>
              <AlertBox error={error}/>
              <div id="result">
              {value} <p/>
              <button onClick={this.go_to_screen.bind(this, 1)}>Back</button>
              <button onClick={this.clear_text}>Clear</button>
              </div>
            </div>
          )
    } // switch
  } // render
});

var InputApp = React.createClass({
  render: function(){
    if(this.props.error){
    return (
      <div className="draggable-element error" onClick={this.props.click}>
        <i className="fa fa-pencil-square"></i>
        <div className="draggable-handle">Add Input {this.props.error}</div>
      </div>
    )
  }
  else{
    return(
      <div className="draggable-element" onClick={this.props.click}>
        <i className="fa fa-pencil-square"></i>
        <div className="draggable-handle">Add Input {this.props.error}</div>
      </div>
    )
  }
  }
});

var AlertBox = React.createClass({
  render: function(){
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes();
    if(this.props.error){
        return(
          <div className="taskbar">
            Error add an input first.
          </div>
        )
    }
    else{
      return(
        <div className="taskbar">
          <span id="task-left"> 4G <i className="fa fa-wifi"></i></span>
          <span id="task-center">{time}</span>
          <span id="task-right"> 100% <i className="fa fa-battery-full"></i></span>
        </div>
      )
    }
  }
});

ReactDOM.render(<SetAbout />, document.getElementById('apps'));

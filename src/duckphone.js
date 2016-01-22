
function validate_input(input, type){
  if(input == null){ return false; }
  var primitves = [String, Number, Boolean, Symbol];
  if(primitves.indexOf(type) != -1){
    if(type == Number && input == NaN){ return false; }
    return typeof(input) == type.name.toLowerCase();
  }
  else
  {
    return input instanceof type;
  }
}


function reducer(state, action)
{
  switch(action.type)
  {
    case 'IPHONE_SHOW':
    if(validate_input(action.section, String)){
      state.iphone.show = !state.iphone.show;
      state.iphone.display = action.section; }
      return state
    case 'IPHONE_DISPLAY':
      if(validate_input(action.key, String)){
        state.iphone.display = action.key; }
      return state
    case 'FEATURE_SHOW':
      if(validate_input(action.step, Number)){
        state.feature.show = action.step; }
      return state
    case "STEP_STEP":
      if(validate_input(action.step, Number) && action.step < 5){
        state.steps.step = action.step; }
      return state
    case "UPDATE_DATA":
      if(validate_input(action.key, String) &&
       validate_input(action.value, String)){
      state.data[action.section][action.key] = action.value; }
      return state;

    default:
      console.log(action);
      return state
  }
}

var initialState = {
  "iphone": { "show": false, display: "about_us" },
  "steps": {"step": 1},
  "feature": {"show": 0},
  "data": {
    "about_us": { "name": "", "subtitle": "", "description": "" },
    "call_us": {"phone": ""},
    "gallery": {},
    "video": {"link": "", "name": "", "description": ""},
    "facebook": {"name": ""},
    "wall": {"detail": ""} } };

var store = Redux.createStore(reducer, initialState);

var Main = React.createClass({
  displayName: "Main",
  propTypes: {
    data: React.PropTypes.shape({
      about_us: React.PropTypes.string
    })
  },
  data: store.getState().data,
  show: function(action){ store.dispatch(action); },
  getInitialState: function(){
    console.log('main');
    return null;
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "main", className: "container animated fadeInDown" },
      React.createElement(
        Controller,
        null,
        React.createElement(Steps, { show: this.show, data: this.data }),
        React.createElement(Iphone, { show: this.show, data: this.data })
      )
    );
  }
});

var Controller = React.createClass({
  displayName: "Controller",

  showKids: function () {
    console.log(this.props.children);
  },
  render: function () {
    //this.props.children.map(child => child.props = this.props);
    return React.createElement(
      "div",
      { id: "controller" },
      React.createElement(
        "a",
        { onClick: this.showKids },
        "show elements"
      ),
      this.props.children
    );
  }
});

var Header = React.createClass({
  displayName: "Header",

  render: function () {
    return React.createElement(
      "div",
      { id: "header", className: "header" },
      React.createElement(
        "span",
        { id: "logo" },
        " AppPods "
      ),
      React.createElement(
        "span",
        { id: "right", className: "center-right" },
        React.createElement(
          "span",
          null,
          " Menu "
        ),
        React.createElement(
          "span",
          null,
          " Menu "
        ),
        React.createElement(
          "span",
          null,
          " Menu "
        ),
        React.createElement(
          "span",
          null,
          " Menu "
        ),
        React.createElement(
          "span",
          { id: "signout", className: "right" },
          " Sign Out "
        )
      ),
      React.createElement("hr", null)
    );
  }
});

var Iphone = React.createClass({
  displayName: "Iphone",

  getInitialState: function () {
    return store.getState().iphone;
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "thephone" },
      React.createElement(
        "div",
        { className: "content" },
        React.createElement("img", { id: "layer1", src: "../../images/iphone6.png" }),
        React.createElement(
          "div",
          { id: "layer2", className: "inside_the_phone" },
          this.state.show ? React.createElement(IphoneShow, {  }) : React.createElement(IphoneApps, { show: this.state.show })
        )
      )
    );
  }
});

var IphoneApps = React.createClass({
  displayName: "IphoneApps",
  show_iphone: function(int, section){
    store.dispatch({ type: "FEATURE_SHOW", step: int });
    store.dispatch({type: "STEP_STEP", step: 2});
    store.dispatch({ type: "IPHONE_SHOW", section: section }) },
  render: function () {

    return React.createElement(
      ReactReorderable,
      null,
      React.createElement(
        "div",
        { className: "draggable-element aboutus", value: 1, onClick: this.show_iphone.bind(this, 1, "about_us")  },
        React.createElement(
          "div",
          { className: "draggable-handle", value: 1 },
          "About Us"
        )
      ),
      React.createElement(
        "div",
        { className: "draggable-element callus", onClick: this.show_iphone.bind(this, 2, "call_us") },
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Call Us"
        )
      ),
      React.createElement(
        "div",
        { className: "draggable-element gallery", onClick: this.show_iphone.bind(this, 3, "gallery") },
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Gallery"
        )
      ),
      React.createElement(
        "div",
        { className: "draggable-element video", onClick: this.show_iphone.bind(this, 4, "video") },
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Video"
        )
      ),
      React.createElement(
        "div",
        { className: "draggable-element fb", onClick: this.show_iphone.bind(this, 5, "facebook") },
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Facebook"
        )
      ),
      React.createElement(
        "div",
        { className: "draggable-element fanwall", onClick: this.show_iphone.bind(this, 6, "wall") },
        React.createElement(
          "div",
          { className: "draggable-handle" },
          "Fan Wall"
        )
      )
    );
  }
});

var IphoneShow = React.createClass({
  displayName: "IphoneShow",
  mapToElement: function(value, index, list){
    return React.createElement(
      IphoneElement, { key: index, id: value, text: this.section()[value], template: store.getState().iphone.display  }
    );
  },
  section: function() { return store.getState().data[store.getState().iphone.display]; },

  render: function () {
    return React.createElement(
      "div",
      { id: "iphone_show" },
      Object.keys(this.section()).map(this.mapToElement)
    );
  }
});

var IphoneElement = React.createClass({
  displayName: "IphoneElement",
  getInitialState: function() { return null },
  render: function() {
    return React.createElement(
      "div", { id: "IphoneElement", className: "row animated slideInRight" },
      React.createElement(
        "div", { id: "FormValue", className: "well col-xs-8 col-xs-offset-1" },
        this.props.id + " : " + this.props.text
      )
    )


  }
});

var Steps = React.createClass({
  displayName: "Steps",

  getInitialState: function () {
    return store.getState().steps;
  },
  go_to_screen: function (i) {
    this.props.show({type: "STEP_STEP", step: i});
    if(i == 2){
      this.props.show({type: "FEATURE_SHOW", step: 0});
    }
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "stepbar", className: "content_left" },
      "Steps to create your app",
      React.createElement(
        "div",
        {className: "spacer"}
      ),
      React.createElement(
        "span",
        { onClick: this.go_to_screen.bind(this, 1) },
        " 1. Name Your Shop"
      ),
      React.createElement(
        "span",
        { onClick: this.go_to_screen.bind(this, 2) },
        " 2. Features "
      ),
      React.createElement(
        "span",
        { onClick: this.go_to_screen.bind(this, 3) },
        " 3. Templates "
      ),
      React.createElement(StepView, { step: this.state.step, data: this.props.data })
    );
  }
});

var StepView = React.createClass({
  displayName: "StepView",
  updateAppName: function(event){
    store.dispatch({ 'type': "UPDATE_DATA", 'section': "about_us", key: "name", value: event.target.value });
   },
  render: function () {
    switch (this.props.step) {
      case 1:
        return React.createElement(
          "div",
          { id: "ShopName", className: "panel animated fadeIn" },
          React.createElement("h3", { }, "Label your pod"),
          React.createElement("input", { type: "text", value: this.props.data.about_us.name,
          className: "form-control", onChange: this.updateAppName })
        );
      case 2:
        return React.createElement(FeatureView, { data: this.props.data });
      case 3:
        return React.createElement(
          "div",
          { id: "TemplateView" },
          React.createElement(TemplateView, { data: this.props.data })
        );
      case 4:
        return React.createElement(
          "div",
          { id: "Storage" },
          "Storage"
        );
    }
  }
});

var TemplateView = React.createClass({
  displayName: "TemplateView",
  render: function () {
    return React.createElement(
      "div",
      { id: "TemplateView", className: "animated fadeInUp" },
      "templates here"
    );
  }
});

var FeatureView = React.createClass({
  displayName: "FeatureView",
  getInitialState: function () {
    return store.getState().feature;
  },
  updateServer: function (options) {
    jQuery.ajax(options);
  },
  render: function () {
    switch (this.state.show) {
      case 0:
        return React.createElement(
          "div",
          { id: "menu", className: "tab-pane animated fadeInUp" },
          React.createElement(Features, { } )
        );
      case 1:
        return React.createElement(
          "div",
          { id: "stepone" },
          React.createElement(Step_AboutUs, { data: this.props.data.about_us })
        );
      case 2:
        return React.createElement(
          "div",
          { id: "steptwo" },
          React.createElement(Step_CallUs, { data: this.props.data.call_us })
        );
      case 3:
        return React.createElement(
          "div",
          { id: "stepthree" },
          React.createElement(Step_Gallery, { data: this.props.data.gallery })
        );
      case 4:
        return React.createElement(
          "div",
          { id: "stepfour" },
          React.createElement(Step_Video, { data: this.props.data.video })
        );
      case 5:
        return React.createElement(
          "div",
          { id: "stepfive" },
          React.createElement(Step_FB, { data: this.props.data.facebook })
        );
      case 6:
        return React.createElement(
          "div",
          { id: "stepsix" },
          React.createElement(Step_FanWall, { data: this.props.data.wall })
        );
      default:
      console.log(this.state);
        return React.createElement(
          "div",
          { id: "error" },
          "something went wrong with the inherintance"
        );

    }
  }
});

var Features = React.createClass({
  render: function () {
    return(
      React.createElement(
        "div",
        {className: "features"},
        React.createElement(
          "div",
          { className: "row"},
          React.createElement(
            FeatureBox, { active: "http://52.11.4.98/dist/img/about-us.png",
            inactive: "http://52.11.4.98/dist/img/about-us-before.png", id: 1
           }
         ),
         React.createElement(
           FeatureBox, { active: "http://52.11.4.98/dist/img/call-us.png",
           inactive: "http://52.11.4.98/dist/img/call-us-before.png", id: 2
          }
        ),
        React.createElement(
          FeatureBox, { active: "http://52.11.4.98/dist/img/image-icon.png",
          inactive: "http://52.11.4.98/dist/img/image-icon-before.png", id: 3
         }
       )
     ),
     React.createElement(
       "div",
       { className: "row"},
       React.createElement(
         FeatureBox, { active: "http://52.11.4.98/dist/img/video-icon.png",
         inactive: "http://52.11.4.98/dist/img/video-icon-before.png", id: 4
        }
      ),
      React.createElement(
        FeatureBox, { active: "http://52.11.4.98/dist/img/fb-icon.png",
        inactive: "http://52.11.4.98/dist/img/fb-icon-before.png", id: 5
       }
     ),
       React.createElement(
         FeatureBox, { active: "http://52.11.4.98/dist/img/fanwall.png",
         inactive: "http://52.11.4.98/dist/img/fanwall-before.png", id: 6
        }
      )
    )
  )
) // return
  }
});

var FeatureBox = React.createClass({
  getInitialState: function(){
    return {focus: false};
  },
  showFeature: function(id){
     store.dispatch({ type: "FEATURE_SHOW", step: id });
  },
  UserFocus: function(focused){
    this.setState({focus: focused });
  },
  render: function(){
    return(
      React.createElement(
        "div",
        { className: "col-xs-4 animated fadeIn",
        onMouseOver: this.UserFocus.bind(this, true),
        onMouseOut: this.UserFocus.bind(this, false),
        onClick: this.showFeature.bind(this, this.props.id)},
        React.createElement(
          "div",
          { className: "gradient-box"},
          React.createElement(
            "img",
            {src: this.state.focus ? this.props.active : this.props.inactive,
               className: "center-block"}
          )
        )
      )
    )
  }
})

var Step_AboutUs = React.createClass({
  displayName: "Step_AboutUs",
  logProps: function () {
  },
  UPDATE_DATA: function(key, event){
    store.dispatch({ type: "UPDATE_DATA", section: "about_us", key: key, value: event.target.value });
  },
  post_form: function(data){
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/record.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){ console.log(response); },
      error: function(response) { console.log("error"); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetAboutUs form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);
    console.log("unmoumted");

  },
  render: function () {
    return React.createElement(
      "div",
      { id: "SetAboutUs", className: "row animated fadeIn" },
      React.createElement(
        "div",
        { className: "col-xs-12" },
          React.createElement(
            "form",
            {method: "POST", encType: "multipart/form-data"},
            React.createElement(
              "h3",
              {className: "duck-underline"},
              "About Us"
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                "h4", { className: "title" },
                "Shop Name: " + this.props.data.name
              )
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                "h4", {className: "title"},
                "Upload Shop Logo"
              ),
              React.createElement(
                "img", {className: "img-circle col-xs-10 col-xs-offset-1", name: "shop_logo", src: null }
              ),
              React.createElement(
                "input", { type: "file", name: "image", accept: "image/*" }
              )
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                "h4", { className: "title" }, "Subtitle"
              ),
              React.createElement(
                "input", { type: "text",
                className: "subtitle form-control",
                placeholder: "Enter subtitle less than 35 characters",
                onChange: this.UPDATE_DATA.bind(this, "subtitle")
               }
              )
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                "h4", { className: "title" }, "Description"
              ),
              React.createElement(
                "textarea", { type: "text",
                className: "subtitle form-control",
                placeholder: "Enter Description less than 250 characters",
                onChange: this.UPDATE_DATA.bind(this, "description")
               }
              )
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                "button", { className: "btn btn-primary" },
                "Next"
              )
            )
          )
      )
    );
  }
});

var Step_CallUs = React.createClass({
  displayName: "Step_CallUs",
  getInitialState: function() {
    return store.getState().data.call_us
  },
  UPDATE_DATA: function(key, event){
    store.dispatch({ type: "UPDATE_DATA", section: "call_us", key: key, value: event.target.value });
  },
  post_form: function(data){
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/record.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){ console.log(response); },
      error: function(response) { console.log("error"); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetCallUS form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);
    console.log("unmoumted");

  },

  render: function () {
    return React.createElement(
      "div",
      { id: "SetCallUS", className: "row" },
      React.createElement(
        "div",
        { className: "col-xs-12" },
          React.createElement(
            "form",
            {method: "POST", encType: "multipart/form-data"},
            React.createElement(
              "h3",
              {className: "duck-underline"},
              "Call Us"
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                "h4", {className: "title"},
                "Phone Number"
              ),
              React.createElement(
                "input", { type: "text",
                className: "form-control",
                value: this.state.phone,
                onChange: this.UPDATE_DATA.bind(this, "phone"),
                name: "phone" }
              )
            )
          ) // post
        )
      )
  }
});

var Step_Gallery = React.createClass({
  displayName: "Step_Gallery",

  render: function () {
    return React.createElement(
      "div",
      { id: "SetGallery", className: "row" },
      React.createElement(
        "div", { className: "col-xs-12 well"},
        React.createElement(DropZone, { id: "mydropzone1", label: "Image 1" })
      )
    );
  }
});

var Step_Video = React.createClass({
  displayName: "Step_Video",
  getInitialState: function(){
    return store.getState().data.video
  },
  UPDATE_DATA: function(key, event){
    store.dispatch({ type: "UPDATE_DATA", section: "video", key: key, value: event.target.value });
  },
  post_form: function(data){
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/record.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){ console.log(response); },
      error: function(response) { console.log("error"); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetVideo form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);
    console.log("unmoumted");

  },

  render: function () {
    return React.createElement(
      "div",
      { id: "SetVideo" },
      React.createElement(
        "form",
        {method: "POST", encType: "multipart/form-data"},
        React.createElement(
          "h3",
          {className: "duck-underline"},
          "Video"
        ),
        React.createElement(
          "div",
          {className: "form-group"},
          React.createElement(
            "h4", {className: "title"},
            "Youtube Link"
          ),
          React.createElement(
            "input", { type: "text",
            className: "form-control",
            value: this.state.link,
            onChange: this.UPDATE_DATA.bind(this, "link"),
            name: "phone" }
          )
        ),
        React.createElement(
          "div",
          {className: "form-group"},
          React.createElement(
            "h4", {className: "title"},
            "Video Name"
          ),
          React.createElement(
            "input", { type: "text",
            className: "form-control",
            value: this.state.name,
            onChange: this.UPDATE_DATA.bind(this, "name"),
            name: "phone" }
          )
        ),
        React.createElement(
          "div",
          {className: "form-group"},
          React.createElement(
            "h4", {className: "title"},
            "Video Description"
          ),
          React.createElement(
            "input", { type: "text",
            className: "form-control",
            value: this.state.description,
            onChange: this.UPDATE_DATA.bind(this, "description"),
            name: "phone" }
          )
        )
      ) // post
    );
  }
});

var Step_FB = React.createClass({
  displayName: "Step_FB",
  getInitialState: function(){
    return store.getState().data.facebook
  },
  UPDATE_DATA: function(key, event){
    store.dispatch({ type: "UPDATE_DATA", section: "facebook", key: key, value: event.target.value });
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "SetFaceBook" },
      React.createElement(
        "form",
        {method: "POST", encType: "multipart/form-data"},
        React.createElement(
          "h3",
          {className: "duck-underline"},
          "Facebook LiveFeed"
        ),
        React.createElement(
          "div",
          {className: "form-group"},
          React.createElement(
            "h4", {className: "title"},
            "Insert Facebook Page Name"
          ),
          React.createElement(
            "input", { type: "text",
            className: "form-control",
            value: this.state.name,
            onChange: this.UPDATE_DATA.bind(this, "name"),
            name: "name" }
          )
        )
      )
    );
  }
});

var Step_FanWall = React.createClass({
  displayName: "Step_FanWall",
  getInitialState: function(){
    return store.getState().data.wall
  },
  UPDATE_DATA: function(key, event){
    store.dispatch({ type: "UPDATE_DATA", section: "wall", key: key, value: event.target.value });
  },
  post_form: function(data){
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/record.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){ console.log(response); },
      error: function(response) { console.log("error"); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetFanWall form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);
    console.log("unmoumted");
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "SetFanWall" },
      React.createElement(
        "form",
        {method: "POST", encType: "multipart/form-data"},
        React.createElement(
          "h3",
          {className: "duck-underline"},
          "Fan Wall"
        ),
        React.createElement(
          "div",
          {className: "form-group"},
          React.createElement(
            "h4", {className: "title"},
            "Fan Wall Detail"
          ),
          React.createElement(
            "input", { type: "text",
            className: "form-control",
            value: this.state.detail,
            onChange: this.UPDATE_DATA.bind(this, "detail"),
            name: "name" }
          )
        )
      )
    );
  }
});

var DropZone = React.createClass({
  render: function(){
    return React.createElement(
      "form", { method: "POST",
      action: "gall_upload.php",
      className: "dropzone dz-clickable",
      id: this.props.id,
      encType: "multipart/form-data"
    },
    this.props.label,
    React.createElement(
      "input", {type: "text", name: this.props.label }
    ),
    React.createElement(
      "div", { className: "dz-default dz-message" },
      React.createElement(
        "span", { id:"message" },
        "Drag Your Images"
      )
    )
    )
  }
})

var formInstance = function(){
  ReactDOM.render(React.createElement(Main, null), document.getElementById('reactComponents'));
};
store.subscribe(formInstance);
formInstance();

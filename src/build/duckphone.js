var React = require('react');
var ReactDOM = require('react-dom');
var ReactReorderable = require('react-reorderable');
var ColorPicker = require('react-color');
var Redux = require('redux');
var dropzone = require('dropzone');

function fetchStateFromServer($id)
{
  var result;
  jQuery.ajax(
  {
    url: "http://52.11.4.98/allaboutshop/requestapp.php",
    data: {"id": $id},
    async: false,
    type: "GET",
    success: function(response)
    {
      result = JSON.parse(response);

     },
    error: function(response) {
      console.log(response);
      result = false;
     }
 });

  return result;

}

function getState(){
  var loadOldShop = location.search;
  var shopRegex = /([\?|\&]shop\=)([0-9]+)/;
  var cookies = document.cookie;
  // building a localStorage function here
  if(shopRegex.test(loadOldShop)){
    var result = fetchStateFromServer(shopRegex.exec(loadOldShop)[2]);
      return loadState(shopRegex.exec(loadOldShop)[2],
      result ? result : false);
  }
  else{
    return loadState(null, false);
  }
}

function loadState(id, result){
  /*
  branch: ""
fanwall_id: null
page_view: "0"
shop_catagory: ""
shop_fb_feed_id: null
shop_photo: null
shop_qr_code: null
shop_style: "8"
video_description: "eouoeuoeu"
video_id: "0"
video_name: "eouoeu"
video_url: "uoeuoeu"
*/
if(!id){ id = ""};
var initialState = {
  "shop_id": id,
   "iphone": { "show": false, display: "about_us",
     "template" : { "shop_style_id": "", "shop_theme_color": "#fff",
     "shop_bg_color": "#fff", "shop_bg_image": "", "shop_layout": "1"}
   },
   "steps": {"step": 1},
   "feature": {"show": 0},
   "data": {
     "about_us": {"shop_id": id, "shop_name": "", "shop_subtitle": "",
     "shop_description": "", "send": true },
     "call_us": {"phone": "","send": true},
     "gallery": {"send": true},
     "video": {"link": "", "name": "", "description": "", "send": true},
     "facebook": {"name": "", "send": true},
     "wall": {"detail": "", "send": true},
     "loyalty": {}
 }
}
    if(!id)
    {

        return initialState;
    }

  if(localStorage.getItem("apppod" + id)){
    initialState = JSON.parse(localStorage.getItem("apppod" + id));
    console.log(result);
    if(result)
    {
      initialState.data.about_us = {"shop_id": result[0].shop_id,
      "shop_name": result[0].shop_name,
      "shop_subtitle": result[0].shop_subtitle,
      "shop_description": result[0].shop_description,
      "shop_photo_name": result[0].shop_photo_name };
      initialState.data.call_us = {"phone": result[1].call_num,
      "call_id": result[1].call_id };
    }
    return initialState;
  }

  if(id && !localStorage.getItem("apppod" + id))
  {
    if(result)
    {
      initialState.data.about_us = {"shop_id": result[0].shop_id,
      "shop_name": result[0].shop_name,
      "shop_subtitle": result[0].shop_subtitle,
      "shop_description": result[0].shop_description,
      "shop_photo_name": result[0].shop_photo_name };
      initialState.data.call_us = {"phone": result[0].call_num,
      "call_id": result[0].call_id };
    }
    return initialState;
  }

    return initialState;
}



function validate_input(input, type){
  if(input == null){ return false; }
  var primitves = [String, Number, Boolean, Symbol];
  if(primitves.indexOf(type) != -1){
    if(type == Number && isNaN(input)){ return false; }
    return typeof(input) == type.name.toLowerCase();
  }
  else
  {
    return input instanceof type;
  }
}

function saveState(state)
{
  if(state.shop_id)
  {
    localStorage.setItem("apppod" + state.shop_id, JSON.stringify(state));
  }
  else{
    localStorage.setItem("apppod", JSON.stringify(state));
  }

  return state;
}

// in a flux app you dispatch actions to modify the state
function reducer(state, action)
{
  switch(action.type)
  {
    case 'DATA_SAVED':
      state.data[action.section]["send"] = false;
      return saveState(state);
    case 'DATA_FAILED':
      state.data[action.section]["send"] = true;
      return saveState(state);
    case 'no_shop_id':
      state.steps.step = 0;
      return saveState(state);
    case 'IPHONE_SHOW':
    if(validate_input(action.section, String)){
      state.iphone.show = !state.iphone.show;
      state.iphone.display = action.section;
      saveState(state);
    }
      return state
    case 'IPHONE_DISPLAY':
      if(validate_input(action.key, String)){
        state.iphone.display = action.key;
        saveState(state);
       }
      return state
    case 'IPHONE_HOME':
      state.iphone.show = false;
      saveState(state);
      return state;
    case 'FEATURE_SHOW':
      if(validate_input(action.step, Number)){
        state.feature.show = action.step;
        saveState(state);
      }
      return state
    case "STEP_STEP":
      if(validate_input(action.step, Number) && action.step < 5){
        state.steps.step = action.step;
        saveState(state);
      }
      return state
    case "UPDATE_DATA":
      if(validate_input(action.key, String) &&
       validate_input(action.value, String)){
      state.data[action.section][action.key] = action.value;
      state.data[action.section]["send"] = true;
      saveState(state);
    }
      return state;
    case "CHANGE_TEMPLATE":
      state.iphone.template[action.section] = action.value;
      saveState(state)
      return state;
    case "CHANGE_TEMPLATE_STYLE":
      if(validate_input(action.id, Number)){
        state.iphone.template.shop_layout = action.id;
        saveState(state);
      }
      return state;
    case "CHANGE_TEMPLATE_COLOR":
      state.iphone.template[action.section] = action.color[0] == "#" ? action.color : "#" + action.color;
      saveState(state);
      return state;
    default:
      console.log(action);
      return state
  }
}

// this the heart of the flux app it stores both the app state and the functions
var store = Redux.createStore(reducer, getState());
// just a generic holder div
var Main = React.createClass({
  displayName: "Main",
  data: store.getState().data,
  show: function(action){ store.dispatch(action); },
  getInitialState: function(){
    return null;
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "main", className: "animated fadeInDown" },
      React.createElement(
        Controller,
        null,
        React.createElement(Steps, { show: this.show, data: this.data }),
        React.createElement(Iphone, { show: this.show, data: this.data })
      )
    );
  }
});
// all of the other elements are children of this one
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
        { className: "showKids" }
      ),
      this.props.children
    );
  }
});
// header is no longer being used
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
 // filter to apply theme color to iphone elements
var svgFilters = React.createClass({
  getInitialState: function(){
    return store.getState().iphone.template;
  },
  componentDidMount: function(){
    console.log(this);
    jQuery("feColorMatrix").attr('values',
    '0\.393 0\.769 0\.189 0 0 0\.349 0\.686 0\.168 0 0 0\.272 0\.534 0\.131 0 0 0 0 0 1 0');
  },
  componentDidUpdate: function()
  {
    var new_values = this.makeValues(this.hextoRGB(this.state.shop_theme_color));
    this.updateColorMatrix(this.escapeValues(new_values));
  },
  updateColorMatrix: function(values){
    console.log(values);
    jQuery("feColorMatrix").attr('values', values);
  },
  hextoRGB: function(hex){
    // converts the hex value from the state to rgba
    hex = hex.replace(/\#/, '');
    var rgba = {
      'red': parseInt(hex.substring(0,2), 16) / 255,
      'green': parseInt(hex.substring(2,4), 16) / 255,
      'blue': parseInt(hex.substring(4,6), 16) / 255,
      'alpha': "0.15"
    };
    return rgba;
  },
  escapeValues: function(values_string)
  {
    var rvalues = values_string.replace(/\./g, "\.");
    return rvalues.replace(/\,\s?$/, '');
  },
  makeValues: function(rgba)
  {
    // constructs a matrix that will be multiplied against the image
    var values =
    this.addTimes(rgba.red, 3) + "0 0 " +
    this.addTimes(rgba.green, 3) +  "0 0 " +
    "0 0 " + this.addTimes(rgba.blue, 3) +
    "0 0 0 1 0";
    return values;

  },
  addTimes: function(snippet, times)
  {
    if(isNaN(snippet)){ return "1 1 1 1 1"; }
    var values = "";
    for(var c = 0; c < times; c++)
    {
      values += snippet + " ";
    }
    return values;
  },
  render: function(){
    return React.createElement(
      "svg", null,
      React.createElement(
        "filter", {id: "color-matrix"},
        React.createElement(
          "feColorMatrix", {type: "matrix", ref: "test" }
        )
      )
    )
  }
});


var Iphone = React.createClass({
  displayName: "Iphone",

  getInitialState: function () {
    return store.getState().iphone;
  },
  chooseTemplate: function(id) {
    var Templates = [ "template1", "template2", "template3" ];
    return Templates[id - 1];
    // these control the 3 layouts of the iphone app

  },
  render: function () {
    return React.createElement(
      "div",
      { id: "thephone" },
      React.createElement(svgFilters, null),
      React.createElement(
        "div",
        { className: "col-xs-6 col-md-6" },
        React.createElement("img",
        { id: "layer1", src: "../../images/iphone6.png" }),
        React.createElement(
          IphoneTemplate,
          null,
          this.state.show ? React.createElement(IphoneShow, {  }) : React.createElement(Template, { color: this.state.template.shop_theme_color, classType: this.chooseTemplate(this.state.template.shop_layout) }),
          React.createElement(
            IphoneHome, {position: "bottom" }
          )
        )
      )
    );
  }
});

var IphoneHome = React.createClass({
  displayName: "IphoneHome",
  goHome: function(){
    store.dispatch({type: "IPHONE_HOME"});
  },
  render: function(){
    return React.createElement(
      "div", { className: "home_button " + this.props.position, onClick: this.goHome }
    )
  }
})

var IphoneTemplate = React.createClass({
  displayName: "IphoneTemplate",
  getInitialState: function(){
    return store.getState().iphone;
  },
  render: function(){
    return React.createElement(
      "div", {id: "layer2", className: "inside_the_phone"},
      React.createElement(IphoneHome, {position: "top"}),
      this.props.children
    )
  }
});

var Template = React.createClass({
  displayName: "IphoneApps",
  render: function () {
    return React.createElement(
    "div", { id: "phone_body", className: "phone_body"},
      React.createElement("div", { id: "app_top" },
        React.createElement(IphoneHeader, {id: "iphone_header"})
    ),
      React.createElement( IphoneApps, { classType: this.props.classType } )
    )
  }
});

var IphoneHeader = React.createClass({
  getInitialState: function(){
    return store.getState().data;
  },
  getLogoUrl: function(){
    var base = "http://52.11.4.98/shop/lantern12/Duck/Pic2.png";
    if(this.state.about_us.shop_photo_name && this.state.about_us.shop_id)
    {
      base = "http://52.11.4.98/shop/" + this.state.about_us.shop_id + "/shopPhoto/" + this.state.about_us.shop_photo_name;
    }
    return base;
  },
  render: function(){
    return React.createElement(
      "div", { id: "header", className: "row iphone_header"},
      React.createElement(
        "div", { className: "col-xs-4 col-md-4 shopLogo"},
        React.createElement(
          "img", { className: "logo", src: this.getLogoUrl() }
        )
      ),
      React.createElement(
        "ul", { className: "col-xs-4 col-md-4 list-unstyled unstyled" },
        React.createElement(
          "li", null, this.state.about_us.shop_name
        ),
        React.createElement(
          "li", null, this.state.about_us.shop_subtitle
        ),
        React.createElement(
          "li", null, this.state.about_us.shop_description
        )
      )
    )
  }
})

/*
dynamicStyle: function(){ return StyleSheet.create({ background: { backgroundColor: "black" } }); },
style: { backgroundColor: "black" },
*/
var DraggableIphoneBox = React.createClass({
  getInitialState: function(){
    return {tstart: null }
  },
  tstart: function(event){
    console.log(event.timeStamp);
    this.setState({tstart: event.timeStamp});
    console.log(this.state);
  },
  tend: function(event){
    console.log("end");
    if(event.timeStamp -  this.state.tstart < 300){
      this.show_iphone(this.props.id, this.props.section);
    }
  },
  getImage: function(img)
  {
    switch(img)
    {
      case "callus":
      return "../dist/img/call-us.png";
    }
  },
  show_iphone: function(int, section){
    store.dispatch({ type: "FEATURE_SHOW", step: int });
    store.dispatch({type: "STEP_STEP", step: 2});
    store.dispatch({ type: "IPHONE_SHOW", section: section }) },
  render: function(){
    return React.createElement(
      "div",
      { className: "draggable-element " + this.props.image + " " + this.props.classType,
      value: 1,
      onClick: this.show_iphone.bind(this, this.props.id, this.props.section),
      onTouchStart: this.tstart,
      onTouchEnd: this.tend,
      style: {backgroundColor: this.props.bgcolor,
        color: this.props.themecolor, borderColor: this.props.themecolor} } ,
      React.createElement(
        "div",
        { className: "draggable-handle", value: 1,
        style: { color: this.state.shop_theme_color } }
      )
    )
  }
})

var IphoneApps = React.createClass({
  getInitialState: function(){
    return store.getState().iphone.template;
  },
  show_iphone: function(int, section){
    store.dispatch({ type: "FEATURE_SHOW", step: int });
    store.dispatch({type: "STEP_STEP", step: 2});
    store.dispatch({ type: "IPHONE_SHOW", section: section }) },
  render: function(){
    return React.createElement(
        ReactReorderable,
        { id: "phone_apps"},
        React.createElement(
          DraggableIphoneBox, { bgcolor: this.state.shop_bg_color,
            themecolor: this.state.shop_theme_color,
            classType: this.props.classType, image: "callus",
            id: 2, section: "call_us" } ),
        React.createElement(
          DraggableIphoneBox, { bgcolor: this.state.shop_bg_color,
            themecolor: this.state.shop_theme_color,
            classType: this.props.classType, image: "gallery",
            id: 3, section: "gallery" } ),
        React.createElement(
          DraggableIphoneBox, { bgcolor: this.state.shop_bg_color,
            themecolor: this.state.shop_theme_color,
            classType: this.props.classType, image: "video",
            id: 4, section: "video" } ),
        React.createElement(
          DraggableIphoneBox, { bgcolor: this.state.shop_bg_color,
            themecolor: this.state.shop_theme_color,
             classType: this.props.classType, image: "fb",
             id: 5, section: "facebook" } ),
        React.createElement(
          DraggableIphoneBox, { bgcolor: this.state.shop_bg_color,
            themecolor: this.state.shop_theme_color,
            classType: this.props.classType, image: "fanwall",
            id: 6, section: "wall" } ),
        React.createElement(
          DraggableIphoneBox, { bgcolor: this.state.shop_bg_color,
            themecolor: this.state.shop_theme_color,
            classType: this.props.classType, image: "loyalty",
            id: 7, section: "loyalty" } )
      )
  }
})

var IphoneShow = React.createClass({
  displayName: "IphoneShow",
  getInitialState: function(){
    return store.getState().iphone.template;
  },
  mapToElement: function(value, index, list){
    if(value.toLowerCase() != "send"){
    return React.createElement(
      IphoneElement, { key: index, id: value, text: this.section()[value],
        template: store.getState().iphone.display  }
    );
  }
  },
  section: function() { return store.getState().data[store.getState().iphone.display]; },
  background: function(){ return "url(http://52.11.4.98/shop/" + store.getState().shop_id + "/iphoneBackground/" + this.state.shop_bg_image + ")"; },

  render: function () {
    return React.createElement(
      "div",
      { id: "iphone_show", style: { background: this.background() },
      className: "panel focus-white" },
      React.createElement(IphoneShowTemplate,
        { template: store.getState().iphone.display  })
    );
  }
});

var Call_Us_Template = React.createClass({
  getInitialState: function(){
    return store.getState().data.call_us;
  },
  goHome: function(){
    store.dispatch({type: "IPHONE_HOME"});
  },
  render: function(){
    return React.createElement(
      "div", { className: "call-us-template col-xs-8 col-xs-offset-2 panel" },
      React.createElement(
        "h4", { className: "bold text-center" },
        "Would You Like To Call " + store.getState().data.about_us.shop_name
      ),
      React.createElement(
        "div", { className: "text-center call-t-phone" }, this.state.phone
      ),
      React.createElement("div", { className: "call-bottom row col-xs-12" },
        React.createElement("div",
        { className: "call-bottom-left text-blue", onClick: this.goHome }, "Don't Allow"),
        React.createElement("div",
        { className: "call-bottom-right text-blue", onClick: this.goHome }, "Call")
      )
    )
  }
});

var IphoneShowTemplate = React.createClass({
  getInitialState: function(){
    return store.getState().iphone.template;
  },
  mapToElement: function(value, index, list){
    if(value.toLowerCase() != "send"){
    return React.createElement(
      IphoneElement, { key: index, id: value, text: this.section()[value],
        template: store.getState().iphone.display  }
    );
  }
  },
  background: function(){ return "url(http://52.11.4.98/shop/" + store.getState().shop_id + "/iphoneBackground/" + this.state.shop_bg_image + ")"; },
  section: function() { return store.getState().data[store.getState().iphone.display]; },
  render: function () {
    switch(this.props.template){
      case "call_us":
       return React.createElement(
         Call_Us_Template, null
       );
      default:
        return React.createElement(
          "div", null,
          Object.keys(this.section()).map(this.mapToElement)
        );
    }
  }
});

var IphoneElement = React.createClass({
  displayName: "IphoneElement",
  getInitialState: function() { return null },
  render: function() {
    return React.createElement(
      "div", { id: "IphoneElement",
      className: "row animated swipeRight back_white" },
      React.createElement(
        "div", { id: "FormValue",
        className: "panel-body col-xs-8 col-xs-offset-1 col-md-8 col-md-offset-1" },
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
  getClasses: function(stepId){
    console.log("called");
    var classes = "steps_option ";
    if(this.state.step == stepId){ classes += "text-blue duck-underline"; }
    //if(this.state.step != stepId && focus){ classes += "text-focus-blue duck-focus-underline"; }
    else{ classes += "duck-underline-disabled"; }
    return classes;
  },
  render: function () {
    return React.createElement(
      "div",
      { id: "stepbar",
      className: "panel col-xs-6 col-md-5 col-md-offset-1 blur_white no-border" },
      React.createElement("h2",
       { id: "steps_title", className: "panel-heading text-muted"},
      "Steps to create your app"),
      React.createElement(
        "div",
        {className: "spacer"}
      ),
      React.createElement("div", { id: "step_options",
      className: "row spacer col-xs-offset-1" },
      React.createElement(
        StepName,
        { click: this.go_to_screen.bind(this, 1),
          text: " 1. Name Your Shop", stepId: 1 }
      ),
      React.createElement(
        StepName,
        { click: this.go_to_screen.bind(this, 2),
          text: " 2. Features ", stepId: 2  }
      ),
      React.createElement(
        StepName,
        { click: this.go_to_screen.bind(this, 3),
          text: " 3. Templates ", stepId: 3 }
      )),
      React.createElement(StepView, { step: this.state.step,
        data: this.props.data })
    );
  }
});

var StepName = React.createClass({
  getStep: function(){
    return store.getState().steps;
  },
  getInitialState: function(){
    return {focus: false, steps: store.getState().steps }
  },
  flipFocus: function(result){
    this.setState({focus: result, steps: store.getState().steps });
  },
  getClasses: function(stepId){
    var classes = "steps_option ";
    if(this.state.steps.step == stepId){ classes += "text-blue duck-underline"; }
    if(this.state.steps.step != stepId && this.state.focus){ classes += "text-focus-blue duck-focus-underline"; }
    if(this.state.steps.step != stepId && !this.state.focus){ classes += " duck-underline-disabled"; }
    return classes;
  },
  render: function(){
    return(
      React.createElement(
        "span",
        { onClick: this.props.click.bind(this, this.props.stepId),
          className: this.getClasses(this.props.stepId),
          onMouseOver: this.flipFocus.bind(this, true),
          onMouseOut: this.flipFocus.bind(this, false)
         },
        this.props.text
      )
    )
  }
});

var StepView = React.createClass({
  displayName: "StepView",
  updateAppName: function(event){
    store.dispatch({ 'type': "UPDATE_DATA", 'section': "about_us",
    key: "shop_name", value: event.target.value });
    //var path = location.pathname;
    //window.history.pushState({}, null, path + "?shop=" + event.target.value)
   },
  render: function () {
    switch (this.props.step) {
      case 1:
        return React.createElement(
          "div",
          { id: "ShopName",
          className: "panel animated fadeIn col-xs-8 col-xs-offset-1 no-border focus-white" },
          React.createElement("h3", { }, "Label your pod"),
          React.createElement("input", { type: "text", id:"inputError",
          placeholder: "Shop Name", value: this.props.data.about_us.shop_name,
          className: "form-control spacer",
          onChange: this.updateAppName, min: 2, max: 200 }),
          React.createElement(NextButton, { next: 2,
            stepType: "STEP_STEP", addClass:"col-xs-offset-9" } )
        );
      case 2:
        return React.createElement(
          "div", { id: "feature_menu" },
          React.createElement(Features, { } ),
          React.createElement(
          FeatureView, { data: this.props.data })
        );
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
  chooseTemplate: function(id){
    store.dispatch({type: "CHANGE_TEMPLATE_STYLE", "id": id});
  },
  image_preview: function(file){
    console.log(file);
    store.dispatch({type: "CHANGE_TEMPLATE",
    section: "shop_bg_image", value: file.name });
  },
  upload_style: function(){
    var iphone_data = store.getState().iphone.template;
    var data = new FormData(iphone_data);
    jQuery.ajax(
    {
    url: "http://52.11.4.98/allaboutshop/insert_shop_style.php",
    data: iphone_data,
    type: "POST",
    cache: false,
    success: function(response)
    {
      store.dispatch({ type: "DATA_SAVED", section: "template" });
     },
    error: function(response) {
      store.dispatch({ type: "DATA_FAILED", section: "template" });
      console.log("error"); }
  });


  },
  render: function () {
    return React.createElement(
      "div",
      { id: "TemplateView", className: "animated fadeInUp panel back_white col-xs-10 col-xs-offset-1" },
      React.createElement("h4", { className: "panel-head" }, "Templates"),
      React.createElement("div", { className: "btn-group spacer" },
      React.createElement("button", { className: "btn btn-primary",
      onClick: this.chooseTemplate.bind(this, 1) }, "One"),
      React.createElement("button", { className: "btn btn-primary",
      onClick: this.chooseTemplate.bind(this, 2) }, "Two"),
      React.createElement("button", { className: "btn btn-primary",
      onClick: this.chooseTemplate.bind(this, 3) }, "Three")),
      React.createElement("div", { className: "form-group" },
      React.createElement(DropZone, { id: "mydropzone4", label: "",
      url: 'allaboutshop/upload_iphone.php', callBack: this.image_preview })
        //React.createElement("input", { id:"iphone_background", type: "file", accept: "image/*", onChange: this.image_preview } )
      ),
      React.createElement(
        TemplateColorPicker, { title: "Background Color", section: "shop_bg_color" }
      ),
      React.createElement("div", {className: "row" }),
      React.createElement(
        TemplateColorPicker, { title: "Theme Color", section: "shop_theme_color" }
      ),
      React.createElement(
        "button", { id: "upload_style", type: "button",
        onClick: this.upload_style, className: "btn btn-primary" },
        "Submit"
      )
    );
  }
});

var TemplateColorPicker = React.createClass({
  getInitialState: function(){
    return store.getState().iphone.template;
  },
  pickColor: function(section, event){
    this.hex = event.hex;
    this.setState({ hex: event.hex })
    store.dispatch({type: "CHANGE_TEMPLATE_COLOR",
    color: event.hex, section: section})
  },
  chooseTemplate: function(id){
    store.dispatch({type: "CHANGE_TEMPLATE_STYLE", "id": id});
  },
  render: function(){
    return React.createElement(
      "div", { className: "panel back_white" },
      React.createElement("h4", { className: "panel-head" }, this.props.title),
      React.createElement(
        "div", { className: "panel-body" },
        React.createElement(
          ColorPicker, { type: "swatches",
          onChange: this.pickColor.bind(this, this.props.section) }
        )
      ),
      React.createElement(
        "div", { className: "panel col-xs-9 col-md-9" },
        React.createElement(
          "div", { id: "colorValue",
          className: "panel-heading col-xs-7 col-md-7" },
          "hex is: " + this.state[this.props.section]
        ),
        React.createElement(
          "div", { className: "panel-body col-xs-2",
          style: { backgroundColor: this.state[this.props.section] } }
        )
      )
    )
  }
})

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
          { id: "menu", className: "tab-pane animated fadeInUp" }
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
          { className: "row step_row"},
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
       { className: "row step_row"},
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
        { className: "col-xs-4 col-md-4 animated fadeIn",
        onMouseOver: this.UserFocus.bind(this, true),
        onMouseOut: this.UserFocus.bind(this, false),
        onClick: this.showFeature.bind(this, this.props.id)},
        React.createElement(
          "div",
          { id: "gradient-box", className: "gradient-box focus-white"},
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
    store.dispatch({ type: "UPDATE_DATA",
    section: "about_us", key: key, value: event.target.value });
  },
  post_form: function(data, fileName){
    if(this.props.data.send == false){ return false; }
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/record_shop.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response)
      {
        var justNumbers = /([0-9]+)/;
        var path = location.pathname;
        window.history.pushState({}, null,
          path + "?shop=" + justNumbers.exec(response)[0])
            if(fileName){

            store.dispatch({ type: "UPDATE_DATA", section: "about_us",
            key: "shop_id", value: justNumbers.exec(response)[0] });
            store.dispatch( {type: "UPDATE_DATA", section: "about_us",
            key: "shop_photo_name", value: fileName } );
          }
          store.dispatch({ type: "DATA_SAVED", section: "about_us" });
          console.log(store.getState());

       },
      error: function(response) {
        store.dispatch({type: "DATA_FAILED", section: "about_us"});
        console.log(respones); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetAboutUs form");
    var data = new FormData(currentElement[0]);
    var fileName = null;
    if(jQuery("#SetAboutUs form [type='file']")[0].files[0]){
      fileName = jQuery("#SetAboutUs form [type='file']")[0].files[0].name;
    }
    this.post_form(data, fileName);

  },
  render: function () {
    return React.createElement(
      "div",
      { id: "SetAboutUs", className: "row animated fadeIn" },
      React.createElement(
        "div",
        { className: "col-xs-12 col-md-12" },
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
                "Shop Name: " + this.props.data.shop_name
              ),
              React.createElement(
                "input",
                { type: "hidden", value: this.props.data.shop_name,
                name: "shop_name" }
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
                "img",
                {className: "img-circle col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1",
                name: "shop_logo", src: null }
              ),
              React.createElement(
                "input", { type: "file", id: "shop_photo",
                name: "shop_photo", accept: "image/*" }
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
                onChange: this.UPDATE_DATA.bind(this, "shop_subtitle"),
                name: "shop_subtitle",
                value: this.props.data.shop_subtitle,
                min: 1,
                max: 35
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
                onChange: this.UPDATE_DATA.bind(this, "shop_description"),
                name: "shop_description",
                value: this.props.data.shop_description
               }
              )
            ),
            React.createElement(
              "div",
              {className: "form-group"},
              React.createElement(
                NextButton, { next: 2, stepType: "FEATURE_SHOW" }
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
  thai_number: /^(?:\+\d{0,3}\s?)?(?:\d{0,3}\-?)\d{0,7}$/,
  UPDATE_DATA: function(key, event){
    console.log(this.thai_number.test(event.target.value));
    store.dispatch({ type: "UPDATE_DATA", section: "call_us",
    key: key, value: event.target.value });
  },
  post_form: function(data){
    if(this.state.send == false){ return false; }
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/insert_call.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){
        store.dispatch({ type: "DATA_SAVED", section: "call_us" });
       },
      error: function(response) {
        store.dispatch({type: "DATA_FAILED", section: "call_us"});
        console.log(response); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetCallUS form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);

  },

  render: function () {
    return React.createElement(
      "div",
      { id: "SetCallUS", className: "row" },
      React.createElement(
        "div",
        { className: "col-xs-12 col-md-12" },
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
                "input", { type: "tel",
                className: "form-control",
                value: this.state.phone,
                onChange: this.UPDATE_DATA.bind(this, "phone"),
                min: 7,
                max: 20,
                pattern: this.thai_number,
                name: "call_num",
                style:{
                  borderColor: this.thai_number.test(this.state.phone) ? null : "red",
                  boxShadow: this.thai_number.test(this.state.phone) ? null : "none",
                }
               }
              ),
              React.createElement(
                NextButton, { next: 3, stepType: "FEATURE_SHOW" }
              )
            )
          ) // post
        )
      )
  }
});

var Step_Gallery = React.createClass({
  displayName: "Step_Gallery",
  update_model: function(){

  },
  render: function () {
    return React.createElement(
      "div",
      { id: "SetGallery", className: "row" },
      React.createElement(
        "div", { id: "gallery-well",
        className: "col-xs-12 col-md-12 well back_white no-border"},
        React.createElement(DropZone, { id: "mydropzone1",
        label: "1", url: 'gall_upload.php?album=',
        callBack: this.update_model }),
        React.createElement(DropZone, { id: "mydropzone2",
        label: "2", url: 'gall_upload.php?album=',
        callBack: this.update_model }),
        React.createElement(DropZone, { id: "mydropzone3",
        label: "3", url: 'gall_upload.php?album=',
        callBack: this.update_model })
      ),
      React.createElement(NextButton, { next: 4, stepType: "FEATURE_SHOW" })
    );
  }
});

var Step_Video = React.createClass({
  displayName: "Step_Video",
  getInitialState: function(){
    return store.getState().data.video
  },
  UPDATE_DATA: function(key, event){
    store.dispatch({ type: "UPDATE_DATA", section: "video",
    key: key, value: event.target.value });
  },
  post_form: function(data){
    if(this.state.send == false){ return false; }
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/insert_youtube.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){
        store.dispatch({ type: "DATA_SAVED", section: "video" });
        console.log(response); },
      error: function(response) {
        store.dispatch({type: "DATA_FAILED", section: "video"});
        console.log(response); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetVideo form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);

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
            "input", { type: "url",
            className: "form-control",
            value: this.state.link,
            onChange: this.UPDATE_DATA.bind(this, "link"),
            name: "video_url" }
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
            name: "video_name" }
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
            name: "video_description" }
          )
        ),
        React.createElement(
          NextButton, { next: 5, stepType: "FEATURE_SHOW" }
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
    store.dispatch({ type: "UPDATE_DATA", section: "facebook",
    key: key, value: event.target.value });
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
        ),
        React.createElement(
          NextButton, { next: 6, stepType: "FEATURE_SHOW" }
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
    store.dispatch({ type: "UPDATE_DATA", section: "wall",
    key: key, value: event.target.value });
  },
  post_form: function(data){
    if(this.state.send == false){ return false; }
      jQuery.ajax(
      {
      url: "http://52.11.4.98/allaboutshop/record_shop.php",
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){
        console.log("fan wall no php handler for db");
        store.dispatch({ type: "DATA_SAVED", section: "wall" });
        console.log(response); },
      error: function(response) {
        store.dispatch({type: "DATA_FAILED", section: "wall"});
        console.log(response); }
    });

  },
  componentWillUnmount: function(){
    var currentElement = jQuery("#SetFanWall form");
    var data = new FormData(currentElement[0]);
    this.post_form(data);
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
  componentDidMount: function() {
        var albumID = "Album" + this.props.label;
        var albumNumber = this.props.label;
        var deleteLink = this.deletefile;
				var options =
				{
					maxFiles: 10,
					url: this.props.url + this.props.label,
					dictDefaultMessage: "Drag your images",
					addRemoveLinks: true,
          success: this.props.callBack,
					acceptedFiles: "image/jpeg,image/png,image/gif",

					accept: function(file, done)
					{
						done();
					},
					init: function(albumNumber)
					{
						this.on("addedfile", function(file)
						{
							//alert("Add File");
							var id = location.search.split('shop=')[1] ? location.search.split('shop=')[1] : 'Not Found';
							//alert(document.getElementsByName("Album1")[0].value);
							if(id == "Not Found")
							{
								alert("Please Update Shop Name at first tab.");
								this.removeFile(file);
							}
							if(albumNumber && document.getElementsByName(albumID)[0].value == "")
							{
								alert("Please insert Album name first.");
								this.removeFile(file);
							}
							else if(albumNumber && !/^[A-z]+[A-z -_]*$/.test(document.getElementsByName(albumID)[0].value))
							{
								alert("Album name is not correct format.");
								this.removeFile(file);
							}
						});
						this.on("maxfilesexceeded", function(file)
						{
							alert("No more files please!");
						});
						this.on("removedfile", function(file)
						{
							deleteLink(file, albumNumber);
						});
					}
				};
    new dropzone("#" +  this.props.id, options);

  },
  deletefile: function(value, album)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        //alert(xmlhttp.responseText);
      }
    }
    xmlhttp.open("GET","gall_cancel.php?filename=" + value.name + "&album=" + album + "&shop=something", true);
    xmlhttp.send();
},
updateAlbumDetail: function(id)
{
		var description = document.getElementById("des"+id).value;
		//alert(description);
		var xmlhttp;
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				alert(xmlhttp.responseText);
			}
		}
		//alert("update_photo_detail.php?photo=" + id + "&des=" + description);
		xmlhttp.open("GET","update_photo_detail.php?photo=" + id + "&des=" + description, true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
		//alert("readyState="+xmlhttp.readyState+", Status"+xmlhttp.status);
		/*$.ajax
		({
			url: "update_photo_detail.php?photo=" + id + "&des=" + description,
			complete: function (response)
			{
				$('#output').html(response.responseText);
			},
			error: function ()
			{
				$('#output').html('Bummer: there was an error!');
			}
		});*/
				},
  render: function(){
    return React.createElement(
      "form", { method: "POST",
      action: "gall_upload.php",
      className: "dropzone dz-clickable",
      id: this.props.id,
      encType: "multipart/form-data"
    },
    this.props.label ? "Album " + this.props.label : null,
    this.props.label ? React.createElement(
      "input", {type: "text", name: "Album" + this.props.label }
    ) : null,
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

var NextButton = React.createClass({
  displayName: "Next Button",
  propTypes: {
    next: React.PropTypes.number,
    stepType: React.PropTypes.string
  },
  go_to: function(stepType, stepId){
      store.dispatch({type: stepType, step: stepId});
  },
  render: function(){
    return React.createElement(
      "Div", { className: "form-group spacer" },
      React.createElement(
        "button", {
          type: "button",
          className: "btn btn-primary next-blue next-btn " + this.props.addClass,
          onClick: this.go_to.bind(this, this.props.stepType, this.props.next)
        }, "Next"
      )
    )
  }
})

var formInstance = function(){
  ReactDOM.render(React.createElement(Main, null),
  document.getElementById('reactComponents'));
};
store.subscribe(formInstance);
formInstance();

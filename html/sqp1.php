<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
.react-reorderable-item-active,
.draggable-element {
  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  
}
.draggable-element {
  background-color:#c2d469;
  
  background: #c2d469; /* Old browsers */

background: -moz-linear-gradient(-45deg,  #c2d469 0%, #1ba6e1 100%); /* FF3.6-15 */

background: -webkit-linear-gradient(-45deg,  #c2d469 0%,#1ba6e1 100%); /* Chrome10-25,Safari5.1-6 */

background: linear-gradient(135deg,  #c2d469 0%,#1ba6e1 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2d469', endColorstr='#1ba6e1',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
box-shadow:5px 5px 10px grey;
opacity:0.8; 

  /*border: 3px solid #444; */
  
}

.draggable-aboutus {

  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  background-image: url(dist/img/about-us.png);
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  opacity:0.8; 
  box-shadow:5px 5px 10px grey;


  
}

.draggable-callus {

  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  background-image: url(dist/img/call-us.png);
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  opacity:0.8; 
  box-shadow:5px 5px 10px grey;


  
}

.draggable-gallery {

  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  background-image: url(dist/img/image-icon.png);
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  opacity:0.8; 
  box-shadow:5px 5px 10px grey;


  
}

.draggable-video {

  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  background-image: url(dist/img/video-icon.png);
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  opacity:0.8; 
  box-shadow:5px 5px 10px grey;

}
  
 .draggable-fb {

  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  background-image: url(dist/img/fb-icon.png);
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  opacity:0.8; 
  box-shadow:5px 5px 10px grey;


  
} 

.draggable-fanwall {

  width: 160px;
  height: 70px;
  margin-top:24px;
  margin-right: 5px;
  border-radius: 15px;
  background-image: url(dist/img/fanwall.png);
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  opacity:0.8; 
  box-shadow:5px 5px 10px grey;


  
}
.draggable-handle {
  /*background-color: grey;*/
  width: 160px;
  height: 70px;
  float: center;
  cursor: move;
  color: gray;
  font-size: 12px;
  padding-left: 55px;
  padding-top: 69px;
  
  font-family: sans-serif;
 
}
#content {
  width: 410px;
  height: 836px;
  background-image: url(../../images/iphone6.png);
  background-repeat:no-repeat;
  padding-top: 111px;
  padding-left: 38px;
  
  
}
.react-reorderable-item {
  display: inline-block;
  margin-right: 10px;
}
.react-reorderable-item-active {
  border: 3px dashed gray;
  background: none;
  border-radius: 20px;
}
.react-reorderable-item-active * {
  display: none;
}
.react-reorderable-handle {
  position: absolute;
}
  </style>
</head>
<body>
 <div id="content"></div>
<div id="events">
</div> 


<script src="../node_modules/react/dist/react-with-addons.js"></script>
<script src="../node_modules/react-dom/dist/react-dom.js"></script>
<script src="../node_modules/react-drag/dist/react-drag.js"></script>
<script src="../dist/react-reorderable.js"></script>
<script>
function addRow(data) {
  var el = document.getElementById('events');
  el.innerHTML += '<br>' + data;
}

function getLabel(node) {
  return node.props.children[1].props.children
}

ReactDOM.render(
    React.createElement(ReactReorderable, {
        handle: '.draggable-handle',
        mode: 'list',
        onDragStart: function (data) {
        //  addRow('Drag start: ' + getLabel(data.props.children));
        },
        onDrop: function (data) {
          //addRow('Drop: ' + data.map(getLabel).join(', '));
        },
        onChange: function (data) {
          //addRow('Change: ' + data.map(getLabel).join(', '));          
        }
      },
      React.createElement('div', {
          className: 'draggable-aboutus'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'About us')
      ),
      React.createElement('div', {
          className: 'draggable-callus'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'Call us')
      ),
      React.createElement('div', {
          className: 'draggable-gallery'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'Gallery')
      ),
      React.createElement('div', {
          className: 'draggable-video'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'Video')
      ),
      React.createElement('div', {
          className: 'draggable-fb'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'FB feed')
      ),
      React.createElement('div', {
          className: 'draggable-fanwall'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'Fan wall')
      ),
      React.createElement('div', {
          className: 'draggable-element'
        }, null, React.createElement('div', { className: 'draggable-handle' }, 'Ducky')
      )
  )
, document.getElementById('content'));
</script>
</body>
</html>
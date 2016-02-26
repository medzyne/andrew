var NS = "http://www.w3.org/2000/svg";
var svg = document.createElementNS(NS, "svg");
var filter = document.createElementNS( NS, "filter" );
filter.setAttribute( "id", "f2" );

var blur = document.createElementNS( NS, "feGaussianBlur" );
blur.setAttribute( "stdDeviation", "5" );

filter.appendChild( blur );
svg.appendChild( filter );

var pic = document.createElementNS(NS, "image");
pic.setAttributeNS(null, 'height', '50');
pic.setAttributeNS(null, 'width', '100');
pic.setAttributeNS(null, 'x', '10');
pic.setAttributeNS(null, 'y', '10');
pic.setAttributeNS("http://www.w3.org/1999/xlink",
"href",
"../dist/img/call-us.png");
pic.setAttributeNS(null, 'visibility', 'visible');
pic.setAttributeNS(null, 'filter', 'url(#f2)');
svg.appendChild(pic);
document.body.appendChild(svg);

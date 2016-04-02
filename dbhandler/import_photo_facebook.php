<meta property="fb:app_id" content="1564077270549073" />
<meta property="og:title" content="appod" />
<meta property="og:url" content="http://appod.co/allaboutshop/import_photo_facebook.php"/>
<meta property="og:description" content="apped"/>
<meta property="og:site_name" content="DuckLabs"/>
<meta property="oog:type" content="Other"/>
<script language="javascript" src="../jquery-1.10.2.min.js"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script src="facebook_api.js"></script>
<style> 
div.border {
    border-radius: 15px 15px 15px 15px;
    background: #3b92a1;
    padding: 20px; 
	width: 100;
	height: 100;
	//border-style: solid;
    //border-color: #000000;
}
</style>
<script>
var start = <?=$_GET['count']?>;
var amount = <?=$_GET['count']?>;
var isFirst = true;
var selectPic = '{ "data" : [';
window.onbeforeunload = function () {
	//window.location.href = "http://appod.co/allaboutshop/save_import_fb_photo.php";   
	selectPic += '], "album":"<?=$_GET['id']?>"}';
	var obj = JSON.parse(selectPic);
	returnYourChoice(obj);
};

// return the value to the parent window
function returnYourChoice(choice){
	opener.setSearchResult(targetField, choice);
	window.close();
}

function getFacebookPage()
{
	var fb_name = document.thisForm.fb_id.value;
	//alert(fb_name);
	
	FB.api('/' + fb_name + '/albums?fields=id,name,link,picture{url}&access_token=1564077270549073|PAsz-rRt1xedfinZmHwZXbtTN2o', function(response) {getAlbumCallback(response);} );
}

function getAlbumCallback(resp) 
{
	//Log.info('Albums', resp);
	var body = document.getElementById('fb');
	body.innerHTML = "";
	var l = resp.data.length;
	for (var i = 0; i < l ; i++)
	{
		var album = resp.data[i],
		div = document.createElement('div'),
		a = document.createElement('a'),
		pic = document.createElement('img');
		div.setAttribute("align", "center");
		div.setAttribute("style", "display: inline-block;vertical-align: top;");
		div.setAttribute("class", "border");
		a.innerHTML = album.name;
		a.href = "#";
		a.setAttribute("onclick", "getFacebookPhoto("+album.id+")");
		pic.setAttribute("src", album.picture.data.url);
		pic.setAttribute("width", "50");
		pic.setAttribute("width", "50");
		div.appendChild(pic);
		div.innerHTML += "<br/>";
		div.appendChild(a);
		body.appendChild(div);
		body.innerHTML += "&nbsp;";
		//alert(album.name);
	}
}

function getFacebookPhoto(albumid)
{
	//alert(albumid);
	FB.api('/' + albumid + '/photos?fields=picture,name,id,created_time&access_token=1564077270549073|PAsz-rRt1xedfinZmHwZXbtTN2o', function(response) {getPhotoCallback(response);} );
}

function getPhotoCallback(resp) 
{
	var body = document.getElementById('fb');
	body.innerHTML = "";
	
	var back = document.createElement('a');
	back.innerHTML = "Back";
	back.href = "#";
	back.setAttribute("onclick", "getFacebookPage()");
	body.appendChild(back);
	body.innerHTML += "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	var ok = document.createElement('input');
	ok.setAttribute("type", "button");
	ok.setAttribute("value", "Finished");
	ok.setAttribute("onclick", "window.close()");
	body.appendChild(ok);
	body.innerHTML += "<br/>";
	
	var select = document.createElement('div');
	select.setAttribute("id", "select");
	select.innerHTML = "Selected Photo <br/>";
	body.appendChild(select);
	body.innerHTML += "<br/><hr/><br/>";
	
	var l = resp.data.length;
	for (var i = 0; i < l ; i++)
	{
		var photo = resp.data[i],
		div = document.createElement('div'),
		//a = document.createElement('a'),
		pic = document.createElement('img');
		div.setAttribute("id", photo.picture);
		div.setAttribute("align", "center");
		div.setAttribute("style", "display: inline-block;vertical-align: top;");
		div.setAttribute("class", "border");
		div.setAttribute("onclick", "selectPicture('"+photo.picture+"')");
		pic.setAttribute("src", photo.picture);
		pic.setAttribute("width", "50");
		pic.setAttribute("width", "50");
		//a.innerHTML = "Select";
		//.href = "#";
		//a.setAttribute("onclick", "selectPicture('"+photo.picture+"')");
		div.appendChild(pic);
		//div.innerHTML += "<br/>";
		//div.appendChild(a);
		body.appendChild(div);
		//body.innerHTML += "&nbsp;";
	}
}

function selectPicture(url)
{
	if(amount > 9)
	{
		alert("Album Full");
		return;
	}
	//alert(url);
	var newParent = document.getElementById('select');
	var obj = document.getElementById(url);
	newParent.appendChild(obj);
	obj.removeAttribute("onclick");
	obj.setAttribute("onclick", "deselectPicture('"+url+"')");
	if(isFirst)
	{
		isFirst = false;
	}
	else
	{
		selectPic += ',';
	}
	selectPic += '{ "url":"' + url + '"}';
	amount++;
}

function deselectPicture(url)
{
	//alert(url);
	var newParent = document.getElementById('fb');
	var obj = document.getElementById(url);
	newParent.appendChild(obj);
	obj.removeAttribute("onclick");
	obj.setAttribute("onclick", "selectPicture('"+url+"')");
	if(isFirst)
	{
		selectPic.replace('{ "url":"' + url + '"}', '');
	}
	else
	{
		selectPic.replace(',{ "url":"' + url + '"}', '');
	}
	amount--;
	if(amount == start)
	{
		isFirst = true;
	}
}

</script>
 <form name="thisForm" method="POST" action="fb_load_album.php" enctype="multipart/form-data">

	Pulling Photo from your Facebook page</br>
	<h4>Insert Facebook Page name</h4>

	<input type="text" class="form-control" placeholder="..." name="fb_id" id="fb_id"/>
	
	<div class="box-footer">
		<button type="button" class="btn btn-primary" onclick="getFacebookPage()">OK!!</button>
	</div>
	
	<div name="fb" id="fb">
	</div>
 </form>   
 
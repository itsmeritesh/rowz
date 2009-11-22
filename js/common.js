
var part1="<table style='position:relative;left:40'><tr><td>Add this as your Question <br><textarea name='question' id='question' rows=4 cols=50>";
var part2 = "</textarea></td></tr><tr><td><input type='button' value='Add as Question' onclick='send_question()'/>&nbsp;&nbsp;<input type='button' value='Cancel' onclick='call_hide(1)'/></td></tr></table>";





function pull_box(query){

new Fx.Tween('overdiv').start('opacity', 0, 1);
new Fx.Tween('mainbody').start('opacity', 1, 0.5);
/*new Request.HTML({
	url: 'gethtml.php?type='+type+"&title="+query,
	method: 'get',
	update: 'overdiv',
	//evalScripts: true,
	//onComplete: function(){console.log('ajax complete!')}
}).send();
*/
 var toset = part1 + query+ part2;
 document.getElementById('overdiv').innerHTML = toset;

}



function pull_comments_search(title, data,dispurl)
 {
	var chtml1="<table style='position:relative;left:40'><tr><td>Add a comment <br><textarea name='comment' id='comment' rows=4 cols=50></textarea></td></tr><tr><td><input type='button' value='Add Comment' onclick='send_comment()'/>&nbsp;&nbsp;<input type='button' value='Cancel' onclick='call_hide(1)'/>";
    
  var chtml2= "</td></tr></table>";
   
   var html = chtml1 +" <input type='hidden' id='title' value='" + title+"'></input>";
	 html = html + "<input type='hidden' id='data' value='" +data+"'></input><input type='hidden' id='dispurl' value='"+dispurl+"'></input>" ;
	html = html + chtml2;
	new Fx.Tween('overdiv').start('opacity', 0, 1);
	new Fx.Tween('mainbody').start('opacity', 1, 0.5);
	 document.getElementById('overdiv').innerHTML = html;
	
 }

function pull_addrepo(title, data,dispurl)
 {
	new Fx.Tween('overdiv').start('opacity', 0, 1);
	new Fx.Tween('mainbody').start('opacity', 1, 0.5);
	

	var  parameter ="title="+encodeURI(title);
   parameter +="&data="+encodeURI(data);
  parameter +="&dispurl="+encodeURI(dispurl);
   document.getElementById('overdiv').innerHTML = "Adding entry ...";
  makePOSTRequest('addtorepo.php',parameter);
 }

function call_hide(what){

	if(what==1){

	new Fx.Tween('overdiv').start('opacity', 1, 0);
	new Fx.Tween('mainbody').start('opacity', 0.5, 1);
	}
}

function call_hide_html(){

	window.setTimeout('call_hide(1)',1000);

}


function send_question(){

var question=document.getElementById('question').value;
//var url = './addquestion.php?question='+question;
/* new Request.HTML({
	url: './addtorepo.php?question='+question,
	method: 'post',
	update: 'overdiv',
	//evalScripts: true,
	onComplete: function(){call_hide(1);}
}).send();
*/
var parameter = "question="+encodeURI(document.getElementById('question').value);
makePOSTRequest('addquestion.php',parameter);
}

function send_comment()
{
  var parameter = "comment="+encodeURI(document.getElementById('comment').value);
   parameter +="&title="+encodeURI(document.getElementById('title').value);
   parameter +="&data="+encodeURI(document.getElementById('data').value);
  parameter +="&dispurl="+encodeURI(document.getElementById('dispurl').value);
  makePOSTRequest('addannotation.php',parameter);

}

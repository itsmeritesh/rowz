
var part1="<table style='position:relative;left:40'><tr><td>Add this as your Question <br><textarea name='question' id='question' rows=4 cols=50>";
var part2 = "</textarea></td></tr><tr><td><input type='button' value='Add as Question' onclick='send_question()'/>&nbsp;&nbsp;<input type='button' value='Cancel' onclick='call_hide(1)'/></td></tr>";

var commentshtml="<table style='position:relative;left:40'><tr><td>Add a comment <br><textarea name='comment' id='comment' rows=4 cols=50></textarea></td></tr><tr><td><input type='button' value='Add Comment' onclick='send_comment()'/>&nbsp;&nbsp;<input type='button' value='Cancel' onclick='call_hide(1)'/></td></tr>";



function pull_box(query,type){

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



function pull_comments(comment, sid, title, data)
 {
	new Fx.Tween('overdiv').start('opacity', 0, 1);
	new Fx.Tween('mainbody').start('opacity', 1, 0.5);
	
 }

function call_hide(what){

	if(what==1){

	new Fx.Tween('overdiv').start('opacity', 1, 0);
	new Fx.Tween('mainbody').start('opacity', 0.5, 1);
	}
}

function call_hide_html(){

	call_hide(1);

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
  var parameter = "question="+encodeURI(document.getElementById('question').value);
  makePOSTRequest('addquestion.php',parameter);

}

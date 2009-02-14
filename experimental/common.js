
function pull_box(type){

new Fx.Tween('overdiv').start('opacity', 0, 1);
new Fx.Tween('mainbody').start('opacity', 1, 0.5);
new Request.HTML({
	url: 'gethtml.php?type='+type,
	method: 'get',
	update: 'overdiv',
	//evalScripts: true,
	//onComplete: function(){console.log('ajax complete!')}
}).send();

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
new Request.HTML({
	url: 'addtorepo.php?question='+question,
	method: 'get',
	update: 'overdiv',
	//evalScripts: true,
	//onComplete: function(){console.log('ajax complete!')}
}).send();

}
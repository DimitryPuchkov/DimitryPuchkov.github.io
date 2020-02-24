let count=document.querySelector('.point'),
		counter = 0,
		shot=document.querySelector('.shot'),
		hit=document.querySelector('.hit');
let button = document.querySelector('.start');
//alert(button);
let key = 0;
var t;
button.addEventListener('click', play);


	function play(){
		//alert("cccc");
	
	if(key==0){
		 t =setInterval(showtarget, 3000);
		key=1;
		button.textContent= 'Стоп';
	}
	else{
		clearInterval(t);
		//alert('stop');
		button.textContent= 'Играть';
		key=0;

	}
	

}
// window.onload=function(){
// 	var t =setInterval(showtarget, 2000);
// 	// var aaa =setTimeout(console.log("1"), 1000);


// }
document.body.addEventListener('click', playShort);


function playShort(e) {
	let el = e.target;
	if(el.classList.contains('can')){
		shot.stop();
		shot.play();
		counter++;
		count.textContent= counter;
		el.classList.add('die');
		setTimeout(deltarget, 500, el);
		//setTimeout(deltarget(), 500);
	}
	else{
		hit.stop();
		hit.play();
	}
}

function showtarget() {
	let randon = Math.floor(Math.random() * (7 - 1 + 1)) + 1;
	//console.log(randon);
	//randon = randon;
	let can = document.getElementById(randon);
	can.classList.remove('none');
	setTimeout(deltarget, 2000, can);
	//console.log(can);
	//setTimeout(deltarget(can), 15000);
}

function deltarget(id) {
	//console.log(id);
	//let i = document.getElementById(id);
	//console.log(i);
	if(id.classList.contains('die')){
		id.classList.remove('die');
	}
	id.classList.add('none');
}


HTMLAudioElement.prototype.stop = function(){
	this.pause();
	this.currentTime = 0.0;
}




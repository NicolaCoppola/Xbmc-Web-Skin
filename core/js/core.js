function pageScrollup() {
    	window.scrollBy(0,-30); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScrollup()',100); // scrolls every 100 milliseconds
}

function pageScrolldown() {
    	window.scrollBy(0,30); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScrolldown()',100); // scrolls every 100 milliseconds
}

function stopScroll() {
    	clearTimeout(scrolldelay);
}

function goBack(){
window.history.back();
}

function InfoApri(){


parent.$("#menu_laterale_info")        .fadeIn("slow");
parent.$("#menu_laterale_info_chiudi") .fadeIn("slow");
parent.$("#remote_control2")           .fadeOut("slow");

window.parent.document.getElementById('img_sfoglia').style.left   = "5%";
window.parent.document.getElementById('img_sfoglia').style.bottom = "4%";

}

function InfoChiudi(){


alert("Ecco il messaggio");

}


function CambiaImmagine(img,background){


window.parent.document.getElementById('img_sfoglia').style.height=('43%');
window.parent.document.getElementById('img_cambia').src=(img);

window.parent.document.getElementById('body').style.background="url("+ background +")";
window.parent.document.getElementById('body').style.backgroundPosition = "right";
window.parent.document.getElementById('body').style.backgroundPosition = "top";

window.parent.document.getElementById('body').style.backgroundSize="100%";


}

function CambiaImmaginequadro(img,background){


window.parent.document.getElementById('img_sfoglia').style.height=('25%');
window.parent.document.getElementById('img_cambia').src=(img);

window.parent.document.getElementById('body').style.background="url("+ background +")";
window.parent.document.getElementById('body').style.backgroundPosition = "right";
window.parent.document.getElementById('body').style.backgroundPosition = "top";
window.parent.document.getElementById('body').style.backgroundSize="100%";

}

function CambiaImmaginerettangolo(img,background){


window.parent.document.getElementById('img_sfoglia').style.height=('10%');
window.parent.document.getElementById('img_cambia').src=(img);

window.parent.document.getElementById('body').style.background="url("+ background +")";
window.parent.document.getElementById('body').style.backgroundPosition = "right";
window.parent.document.getElementById('body').style.backgroundPosition = "top";
window.parent.document.getElementById('body').style.backgroundSize="100%";

}


function RipritinaImmagine(img){


window.parent.document.getElementById('img_sfoglia').style.height=('25%');
window.parent.document.getElementById('img_cambia').src=(img);

window.parent.document.getElementById('body').style.background='url(css/img/video.jpg)';
window.parent.document.getElementById('body').style.backgroundPosition = "right";
window.parent.document.getElementById('body').style.backgroundPosition = "top";

window.parent.document.getElementById('body').style.backgroundSize="auto";

}

function RipritinaImmaginequadro(img){


window.parent.document.getElementById('img_sfoglia').style.height=('25%');
window.parent.document.getElementById('img_cambia').src=(img);

window.parent.document.getElementById('body').style.background='url(css/img/music.jpg)';
window.parent.document.getElementById('body').style.backgroundPosition = "right";
window.parent.document.getElementById('body').style.backgroundPosition = "top";

window.parent.document.getElementById('body').style.backgroundSize="auto";
}

function RipritinaImmaginerettangolo(img){


window.parent.document.getElementById('img_sfoglia').style.height=('25%');
window.parent.document.getElementById('img_cambia').src=(img);

window.parent.document.getElementById('body').style.background='url(css/img/music.jpg)';
window.parent.document.getElementById('body').style.backgroundPosition = "right";
window.parent.document.getElementById('body').style.backgroundPosition = "top";

window.parent.document.getElementById('body').style.backgroundSize="auto";
}
is_0_selected = true;
is_1_selected = true;

function select_0() {
    var remove = document.getElementById("select-0");
    remove.parentElement.removeChild(remove);
}

function select_1() {
    var remove = document.getElementById("select-1");
    remove.parentElement.removeChild(remove);
}

function select_default() {
    select_0();
    select_1();
}

window.onload = function() {
    if (is_0_selected) {
        init_0();
    }

    if (is_1_selected) {
        init_1();
    }
}

function init_0() {

}

function init_1() {
    setInterval( function() {
        var seconds = new Date().getSeconds();
        var sdegree = seconds * 6;
        var srotate = "rotate(" + sdegree + "deg)";
        
        document.getElementById("sec").style.cssText = "-moz-transform:" + srotate + ";-webkit-transform:" + srotate;
    }, 1000 );
    

  setInterval( function() {
        var hours = new Date().getHours();
        var mins = new Date().getMinutes();
        var hdegree = hours * 30 + (mins / 2);
        var hrotate = "rotate(" + hdegree + "deg)";
        
        document.getElementById("hour").style.cssText += "-moz-transform:" + hrotate + ";-webkit-transform:" + hrotate;
  }, 1000 );


    setInterval( function() {
        var mins = new Date().getMinutes();
        var mdegree = mins * 6;
        var mrotate = "rotate(" + mdegree + "deg)";
        
        document.getElementById("min").style += "-moz-transform:" + mrotate + ";-webkit-transform:" + mrotate;
    }, 1000 );
}

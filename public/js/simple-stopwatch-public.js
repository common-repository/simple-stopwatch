var time=0;
var running=0;
function strtpause () {
    if(running==0){
        running=1;
        increment();
        document.getElementById("strtpause").innerHTML="Pause"

    }
    else{
        running=0;
        document.getElementById("strtpause").innerHTML="Resume"
    }
}
function reset(){
running=0;
time=0;
document.getElementById("strtpause").innerHTML="Start"
document.getElementById("output").innerHTML="00:00:00"
}
function increment(){
    if(running==1){
    setTimeout(function(){
     time++;
     var mins=Math.floor(time/10/60);
     var secs=Math.floor(time/10);
     var teths=time%10;
     if(mins<10){
        mins="0"+mins;
     }
     if(secs<10){
        secs="0"+secs;
     }
     document.getElementById("output").innerHTML=mins+":"+secs+":"+teths;
     increment();
    },100);
}
}
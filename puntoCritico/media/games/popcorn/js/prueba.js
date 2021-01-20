
window.onload = updateClock;

var totalTime = 10;

function updateClock() {
    document.getElementById('countdown').innerHTML = totalTime;
    if(totalTime==0){
        alert('Final');
    }else{
        totalTime-=1;
        setTimeout("updateClock()",1000);
    }
}
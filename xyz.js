function time(){
const p = document.getElementById("p");
p.innerText = Date();
}
setInterval(time,1000);

console.log(p);

function demo(){
      document.getElementById("q").style.color = "blue";   
}
function demo1(){
      document.getElementById("q").style.color = "red";   
}

function demo2(){
      var inputfield = document.getElementById("myinput2");
      var inputtext = inputfield.value;

      document.getElementById("text").innerText = inputtext;

      inputfield.value = "";
}

function radiobtn(){
      const radios = document.getElementsByName("gender");

      let selectedValue = "";
      for (const radio of radios){
            if(radio.checked){
                  selectedValue = radio.value;
                  break;
            }
      }
      document.getElementById("radioValue").innerText = selectedValue || "no option selected";
      
}
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

function sayHello() {
      const name = document.getElementById("nameInput").value.trim();

      if (name === "") {
          document.getElementById("greeting").innerText = "দয়া করে নাম লিখুন।";
      } else {
          document.getElementById("greeting").innerText = "Hello, " + name + "!";
      }
  }

//   let newdiv = document.createElement("div");
//   newdiv.innerText = "জাভাস্ক্রিপ্টের মাধ্যমে তৈরি করা হয়েছে।";
//       newdiv.style.position = "fixed";
//       newdiv.style.color = "red";   
//       newdiv.style.fontSize = "20px";
//       newdiv.style.fontWeight = "bold";   
//       newdiv.style.backgroundColor = "yellow";
//       newdiv.style.padding = "10px";
//       newdiv.style.border = "2px solid black";
//       newdiv.style.borderRadius = "5px";
//       newdiv.style.margin = "10px 0";
//       newdiv.style.textAlign = "center";
//       newdiv.style.boxShadow = "2px 2px 5px rgba(234, 22, 22, 0.3)";
//       newdiv.style.cursor = "pointer";    
//       newdiv.style.textTransform = "uppercase";
//       newdiv.style.letterSpacing = "2px";
//       document.body.appendChild(newdiv);


      function calculateSum(){
            const num1 = parseFloat(document.getElementById("num1").value);
            const num2 = parseFloat(document.getElementById("num2").value);
            
            const operation = document.getElementById("operation").value;
            let result;
            if (isNaN(num1) || isNaN(num2)) {
                  result = "সঠিক সংখ্যা দিন!";
                } else {
                  switch (operation) {
                    case 'add':
                      result = num1 + num2;
                      break;
                    case 'subtract':
                      result = num1 - num2;
                      break;
                    case 'multiply':
                      result = num1 * num2;
                      break;
                    case 'divide':
                      result = num2 !== 0 ? num1 / num2 : "০ দিয়ে ভাগ করা যাবে না";
                      break;
                    default:
                      result = "অজানা অপারেশন!";
                  }
                }

            document.getElementById("sumResult").innerText = "Calculate: " + result;
      }

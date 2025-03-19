// this is date code 
function updateDate() {
      const today = new Date();
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('date').innerText = today.toLocaleDateString('en-US', options);
  }
  updateDate();
  
  
  
  // this is nav live clock 
  
  function updateClock() {
        let now = new Date();
        let hours = now.getHours().toString().padStart(2, '0');
        let minutes = now.getMinutes().toString().padStart(2, '0');
        let seconds = now.getSeconds().toString().padStart(2, '0');
        
        let timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById("liveClock").textContent = timeString;
    }
  
    setInterval(updateClock, 1000);
    updateClock(); // পেজ লোড হওয়ার সাথে সাথে সময় দেখাবে
 function showPage(id) {
      const pages = document.querySelectorAll('.page');
      pages.forEach(page => page.classList.remove('active'));
      document.getElementById(id).classList.add('active');
    }
 // Date and Time
    function updateDateTime() {
      const now = new Date();
      const date = now.toLocaleDateString();
      const time = now.toLocaleTimeString();
      document.getElementById('datetime').textContent = `${date} ${time}`;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
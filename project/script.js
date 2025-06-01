function updateClock() {
      const now = new Date();
      const options = {
        weekday: 'long',   // eg: Saturday
        year: 'numeric',
        month: 'long',     // eg: June
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true       // for AM/PM format
      };

      const formattedTime = now.toLocaleString('en-US', options);
      document.getElementById('clock').textContent = formattedTime;
    }

    // Update every second
    setInterval(updateClock, 1000);
    // Initial call to show time instantly on page load
    updateClock();
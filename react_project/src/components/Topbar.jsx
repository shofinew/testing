import { useEffect, useState } from "react";
import "./Topbar.css";

function Topbar() {
  const [currentTime, setCurrentTime] = useState(new Date());

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentTime(new Date());
    }, 1000);

    return () => clearInterval(timer); // cleanup
  }, []);

  const formatTime = (date) => {
    return date.toLocaleTimeString("en-US", {
      hour: "numeric",
      minute: "numeric",
      second: "numeric",
      hour12: true,
    });
  };

  const formatDate = (date) => {
    return date.toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric",
    });
  };

  return (
    <div className="topbar">
      <div className="logo"> MyLogo</div>
      <div className="time-info">
        <div>{formatDate(currentTime)}</div>
        <div>{formatTime(currentTime)}</div>
      </div>
    </div>
  );
}

export default Topbar;

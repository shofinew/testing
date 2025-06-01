import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Topbar from './components/Topbar';
import Navbar from './components/Navbar';
import './App.css';
import Home from './pages/Home';
import Stage1 from './pages/Stage1';
import Stage2 from './pages/Stage2';
import Stage3 from './pages/Stage3';
import Search from './pages/Search';
import Profile from './pages/Profile';

function App() {
  return (
    // ✅ Router ঘিরে ফেলেছি
    <BrowserRouter>
      <Topbar /> {/* সব পেজে দেখাবে */}
      <Navbar /> {/* সব পেজে দেখাবে */}
      
      {/* ✅ এখানে রাউটিং হবে */}

      <div className="container">
        
        <h2>এখানে আরো কিছু ব্যবহার করা যাবে</h2>

        {/* ✅ রাউটিং */}
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/stage1" element={<Stage1 />} />
          <Route path="/stage2" element={<Stage2 />} />
          <Route path="/stage3" element={<Stage3 />} />
          <Route path="/search" element={<Search />} />
          <Route path="/profile" element={<Profile />} />
        </Routes>
      </div>

      
    </BrowserRouter>
  );
}

export default App;

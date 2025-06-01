import { NavLink } from "react-router-dom";
import "./Navbar.css";

function Navbar() {
  return (
    <nav className="navbar">
      <NavLink to="/" end>Home</NavLink>
      <NavLink to="/stage1">Stage1</NavLink>
      <NavLink to="/stage2">Stage2</NavLink>
      <NavLink to="/stage3">Stage3</NavLink>
      <NavLink to="/search">Search</NavLink>
      <NavLink to="/profile">Profile</NavLink>
    </nav>
  );
}

export default Navbar;

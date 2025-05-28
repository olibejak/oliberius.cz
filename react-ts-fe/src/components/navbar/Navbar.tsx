import React, { useState, useContext } from "react";
import "./Navbar.css";

import { Link } from "react-router-dom";
import DarkModeIcon from "../../assets/icons/dark_mode.svg";
import LightModeIcon from "../../assets/icons/light_mode.svg";
import { ThemeContext } from "../../context/ThemeContext";


const themeIconMap: Record<"light" | "dark", string> = {
  light: DarkModeIcon,
  dark: LightModeIcon,
};

const Navbar = () => {

  const {
    theme,
    changeTheme,
  } = useContext(ThemeContext);
  const [dropDown, setDropDown] = useState(false);

  return (
    <nav>
      <ul className="nav-item-list">
        <li className="nav-item">
          <img src={themeIconMap[theme]}
            alt={`${theme} mode icon`}
            onClick={changeTheme}
            className="color-mode-icon"
          />
        </li>
      </ul>
    </nav>
  )
}

export default Navbar;

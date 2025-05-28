import { useContext } from "react";
import "./Navbar.css";

import Dropdown from "./Dropdown.tsx"
import { Link } from "react-router-dom";
import { navbarItems } from "./NavbarItems";
import DarkModeIcon from "../../assets/icons/dark_mode.svg";
import LightModeIcon from "../../assets/icons/light_mode.svg";
import { ThemeContext } from "../../context/ThemeContext";
import { DropdownProvider } from "../../context/DropdownContext.tsx";


const themeIconMap: Record<"light" | "dark", string> = {
  light: DarkModeIcon,
  dark: LightModeIcon,
};

const Navbar = () => {

  const {
    theme,
    changeTheme,
  } = useContext(ThemeContext);

  return (
    <nav>
      <DropdownProvider>
        <ul className="nav-item-list">
          {navbarItems.map((item, index) =>
            <li key={index} className="nav-item">
              {item.children ? (
                <Dropdown item={item} />
              ) : (
                <Link to={item.path ? item.path : '/'}>
                  {item.label}
                </Link>
              )}
            </li>
          )}
          <li className="nav-item">
            <img src={themeIconMap[theme]}
              alt={`${theme} mode icon`}
              onClick={changeTheme}
              className="color-mode-icon"
            />
          </li>
        </ul>
      </DropdownProvider>
    </nav>
  )
}

export default Navbar;

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
        <ul className="header">
          <li className="header-item">
            <Link to={"/"}>
              Zahradnictví Oliberius
            </Link>
          </li>
          <li className="header-item">
            <img src={themeIconMap[theme]}
              alt={`${theme} mode icon`}
              onClick={changeTheme}
              className="color-mode-icon"
            />
          </li>
        </ul>
        <ul className="item-list">
          {navbarItems.map((item, index) =>
            <li key={index} className="list-item" >
              {item.children ? (
                <Dropdown item={item} />
              ) : (
                <Link to={item.path ? item.path : '/'}>
                  {item.label}
                </Link>
              )}
            </li>
          )}
        </ul>
      </DropdownProvider>
    </nav>
  )
}

export default Navbar;

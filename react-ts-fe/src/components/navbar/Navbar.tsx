import { useContext } from "react";
import "./Navbar.css";

import Dropdown from "./Dropdown.tsx"
import { Link } from "react-router-dom";
import { navbarItems } from "./NavbarItems";
import type { NavbarItem } from "./NavbarItems";
import DarkModeIcon from "../../assets/icons/dark_mode.svg";
import LightModeIcon from "../../assets/icons/light_mode.svg";
import { ThemeContext } from "../../context/ThemeContext";
import { DropdownProvider } from "../../context/DropdownContext.tsx";
import type { Theme } from "../../types/Theme.tsx"

const Navbar = () => {

  const themeIconMap: Record<Theme, string> = {
    light: DarkModeIcon,
    dark: LightModeIcon,
  };

  const {
    theme,
    changeTheme,
  } = useContext(ThemeContext);

  const mapNavbarItems = (item: NavbarItem, index: number) => (
    <li key={index} className="list-item" >
      {item.children ? (
        <Dropdown item={item} />
      ) : (
        <Link to={item.path ? item.path : '/'}>
          {item.label}
        </Link>
      )}
    </li>
  )

  return (
    <DropdownProvider>
      <nav>
        <ul className="header">
          <li className="header-item">
            <Link to={"/"}>
              Zahradnictví Oliberius
            </Link>
          </li>
          <li className="header-item"
            onClick={changeTheme}>
            <img src={themeIconMap[theme]}
              alt={`${theme} mode icon`}
              className="color-mode-icon"
            />
          </li>
        </ul>
        <ul className="item-list">
          {navbarItems.map((item, index) =>
            mapNavbarItems(item, index)
          )}
        </ul>
      </nav>
    </DropdownProvider>
  )
}

export default Navbar;

import { useContext } from "react"
import "./Navbar.css";

import { Link } from "react-router-dom";
import { type NavbarItem } from "./NavbarItems";
import { DropdownContext } from "../../context/DropdownContext";
import LightArrowUp from "../../assets/icons/light_keyboard_arrow_up.svg"
import LightArrowDown from "../../assets/icons/light_keyboard_arrow_down.svg"
import DarkArrowUp from "../../assets/icons/dark_keyboard_arrow_up.svg"
import DarkArrowDown from "../../assets/icons/dark_keyboard_arrow_down.svg"
import { ThemeContext } from "../../context/ThemeContext";
import type { Theme } from "../../types/Theme"
import type { ArrowDirection } from "../../types/Icon";


const Dropdown = ({ item }: { item: NavbarItem }) => {

  const { theme } = useContext(ThemeContext)

  const { isOpen, toggleOpen } = useContext(DropdownContext);

  const iconMap: Record<Theme, Record<ArrowDirection, string>> = {
    dark: {
      up: LightArrowUp,
      down: LightArrowDown,
    },
    light: {
      up: DarkArrowUp,
      down: DarkArrowDown,
    },
  };

  return (
    <div className="dropdown"
      onMouseEnter={toggleOpen}
      onMouseLeave={toggleOpen}>
      <span>
        {item.label}
        <img src={isOpen ? iconMap[theme]["up"] : iconMap[theme]["down"]}
          alt="dropdown arrow"
        />
      </span>
      <ul className={isOpen ? "dropdown-open" : "dropdown-closed"}>
        {item.children?.map((child, index) => (
          <li key={index}>
            <Link
              to={item.path ? `${item.path}?p=${child.value}` : '/'}
            >
              {child.label}
            </Link>
          </li>
        ))}
      </ul>
    </div>
  );

}

export default Dropdown;

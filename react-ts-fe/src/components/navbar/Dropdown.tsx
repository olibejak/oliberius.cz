import { useContext } from "react"
import "./Navbar.css";

import { Link } from "react-router-dom";
import { type NavbarItem } from "./NavbarItems";
import { DropdownContext } from "../../context/DropdownContext";
import ArrowUp from "../../assets/icons/keyboard_arrow_up.svg"
import ArrowDown from "../../assets/icons/keyboard_arrow_down.svg"

const Dropdown = ({ item }: { item: NavbarItem }) => {

  const { isOpen, toggleOpen } = useContext(DropdownContext);

  return (
    <div className="dropdown">
      <div onClick={toggleOpen}>
        {item.label}
        <img src={isOpen ? ArrowUp : ArrowDown}
          alt="dropdown arrow"
        />
      </div>
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

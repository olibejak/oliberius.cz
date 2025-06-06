import { createContext, useState } from 'react';
import type { ReactNode } from "react";

const DropdownContext = createContext({
  isOpen: false,
  toggleOpen: () => { },
});

const DropdownProvider = ({ children }: { children: ReactNode }) => {
  const [isOpen, setOpen] = useState(false);
  const toggleOpen = () => {
    setOpen(!isOpen);
  };

  return (
    <>
      <DropdownContext.Provider value={{ isOpen, toggleOpen }}>
        {children}
      </DropdownContext.Provider>
    </>
  )

};

export { DropdownProvider, DropdownContext };

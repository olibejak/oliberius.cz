import { createContext, useState } from "react";
import type { ReactNode } from "react";

export type Theme = "light" | "dark";

const ThemeContext = createContext<{
  theme: Theme;
  changeTheme: () => void;
}>({
  theme: "light",
  changeTheme: () => { }
});

const ThemeProvider = ({ children }: { children: ReactNode }) => {

  const [theme, setTheme] = useState<Theme>("light")
  const changeTheme = () => {
    setTheme(
      theme === "light" ? "dark" : "light"
    );
  };

  return (
    <div>
      <ThemeContext.Provider value={{ theme, changeTheme }}>
        {children}
      </ThemeContext.Provider>
    </div>
  )
}

export { ThemeProvider, ThemeContext };

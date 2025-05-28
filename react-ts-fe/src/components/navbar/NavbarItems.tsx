export type NavbarItem = {
  label: string;
  path?: string;
  value?: string;
  children?: NavbarItem[];
};

export const navbarItems: NavbarItem[] = [
  {
    label: "Vazby",
    path: "vazby",
    children: [
      {
        label: "Dárkové Kytice",
        value: "darkove",
      },
      {
        label: "Smuteční Kytice",
        value: "kytice",
      },
      {
        label: "Smuteční Věnce",
        value: "vence",
      },
      {
        label: "Rakvové Kytice",
        value: "rakvove",
      }
    ]
  },
  {
    label: "Prodejna",
    path: "prodejna",
  },
];

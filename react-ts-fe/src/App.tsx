import { useContext } from "react";
import { Route, Routes } from "react-router-dom";
import './App.css';
import Navbar from "./components/navbar/Navbar";
//import Breadcrumb from "./components/breadcrumb/Breadcrumb";
//import Footer from "./components/footer/Footer";
//import ProductPage from "./pages/ProductPage";
//import HomePage from "./pages/HomePage";
//import ShopPage from "./pages/ShopPage";
//import AdminPage from "./pages/AdminPage";
//import PageNotFound from "./pages/PageNotFound"
import { ThemeContext } from "./context/ThemeContext";

function App() {

  const { theme } = useContext(ThemeContext)

  return (
    <div className="App" data-theme={theme}>
      <Navbar />
      {/*          <Breadcrumb /> */}

      <Routes>
        {/*           <Route path="/" element={<HomePage />} />*/}
        {/*            <Route path="/vazby" element={<ProductPage />} />*/}
        {/*            <Route path="/prodejna/" element={<ShopPage />} />*/}
        {/*            <Route path="/admin" element={<AdminPage />} />*/}

        {/*            <Route path="*" element={<PageNotFound />} />*/}
      </Routes>

      {/*          <Footer />*/}
    </div>
  );
}

export default App;

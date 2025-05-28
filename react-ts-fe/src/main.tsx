import { StrictMode } from 'react'
import { BrowserRouter as Router } from 'react-router-dom'
import { createRoot } from 'react-dom/client'
import { ThemeProvider } from './context/ThemeContext.tsx'
import './index.css'
import App from './App.tsx'

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <Router>
      <ThemeProvider>
        <App />
      </ThemeProvider>
    </Router>
  </StrictMode>
);

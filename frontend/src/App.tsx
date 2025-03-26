import { Outlet } from 'react-router'
import  NavBar from './components/NavBar'
import 'bootstrap/dist/css/bootstrap.min.css';
import Footer from './components/Footer'

import './App.css'

/**
 * Main app component that renders the app layout.
 * 
 * @returns App component
 */
function App() {
  return(
    <div className="app d-flex flex-column min-vh-100">
      {
        //Navbar component
        <NavBar />
      }
      <main className="flex-grow-1">
        <Outlet />
      </main>
      {
        <Footer />
      }
    </div>
  );
}

export default App

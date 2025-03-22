import { Outlet } from 'react-router'
import 'bootstrap/dist/css/bootstrap.min.css';

import './App.css'

function App() {
  return(
    <div className="app d-flex flex-column min-vh-100">
      {
        //! Possbly nav bar here
      }
      <main className="flex-grow-1">
        <Outlet />
      </main>
      {
        //! Possibly footer here
      }
    </div>
  );
}

export default App

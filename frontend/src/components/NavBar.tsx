import { Link } from "react-router-dom";

//Defining a specific type for component props in NavBar function.
type NavBarArgument = {
  isLoggedIn?: boolean;
}

//isLoggedin is set to false by default
export default function NavBar({ isLoggedIn = false }: NavBarArgument) {
  return (
    <header>
      <nav className="navbar">
        <div className="nav-container">

          <Link className="navbar-brand" to="/">
            <span className="blog-title">THE BLOG</span>
          </Link>

          <ul className="nav-menu">
            <li>
              <Link to="/">Articles</Link>
            </li>
            
            //!Not sure if i need to get API call from backend to check if user is logged in
            {isLoggedIn && (
              <li>
                <Link to="/create-article">Create Article</Link>
              </li>
            )}

            <li>
              <Link to="/profile">Profile</Link>
            </li>

            <li>
              <Link to="/login">Login</Link>
            </li>

            <li>
              <Link to="/signup">Sign Up</Link>
            </li>
          </ul>

        </div>
      </nav>
    </header>
  );
}
import { Link } from "react-router-dom";
import Config from '../config/index';


const LARAVEL_LOGIN_URL = `${Config.API_BASE_URL}/login`;
const LARAVEL_SIGNUP_URL = `${Config.API_BASE_URL}/register`;

/**
 * NavBar component renders the navigation bar with links to the homepage,
 * articles, login, and signup pages. The login and signup links point to
 * external Laravel backend URLs.
 * 
 * @returns The rendered navigation bar
 */
const NavBar = () => {
  return(

    <nav className="navbar">
      <div className="nav-container">
        <Link className="navbar-brand" to="/">
          <span className="blog-title">THE BLOG</span>
        </Link>

        <ul className="nav-menu">
          <li>
            <Link to="/">Articles</Link>
          </li>
          <li>
            <a href={LARAVEL_LOGIN_URL}>Login</a>
          </li>
          <li>
            <a href={LARAVEL_SIGNUP_URL}>Sign Up</a>
          </li>
        </ul>
      </div>
    </nav>

  );
};

export default NavBar;


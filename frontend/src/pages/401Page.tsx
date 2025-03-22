import {Link} from 'react-router-dom'

const UnauthorizedPage = () => {
  return (

    <div className="error-container">

      <h1 className="error401_h1">401</h1>

      <h2 className="error401_h2">Unauthorized Access!</h2>

      <p className="error401_p">You must be logged in to access the page</p>

      <div className="error401_btn_container">
        <Link to="/" className="btn btn-secondary error401_btn">
          Login/Sign-up
        </Link>
      </div>

    </div>
  );
};

export default UnauthorizedPage;


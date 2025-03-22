import { Link } from "react-router-dom";
import logoImg from "../images/logo.jpg";

const PendingPage = () => {
  return (
    <div className="pending-wrapper">
      <div className="logo_container">
        <Link to="/">
          <img src={logoImg} alt="Blog Logo" className="logo_img" />
        </Link>
      </div>

      <div className="content-wrapper">
        <h1 className="pending_h1">Waiting for approval!</h1>

        <div className="pending_container">
          <img
            src="/images/approval.svg"
            alt="Approval"
            className="approval_img"
          />
        </div>

        <div className="pending_btn_container">
          <Link to="/" className="btn btn-secondary pending_main_btn">
            Main Page
          </Link>
        </div>
      </div>
    </div>
  );
};

export default PendingPage;

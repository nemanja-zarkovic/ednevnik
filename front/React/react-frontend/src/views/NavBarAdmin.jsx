import React from "react";
import axios from "axios";
import { Link } from "react-router-dom";


const NavBarAdmin = ({ token }) => {

  const auth_token = window.sessionStorage.getItem("auth_token");
  const admin_id = window.sessionStorage.getItem("admin_id");

  function handleLogoutAdmin() {
    let config = {
      method: "post",
      url: "http://127.0.0.1:8000/api/logout-admin",
      headers: {
        Authorization: "Bearer " + auth_token,
      },
    };

    axios
      .request(config)
      .then((response) => {
        console.log(JSON.stringify(response.data));
        window.sessionStorage.removeItem("auth_token");
      })
      .catch((error) => {
        console.log(error);
      });

  }

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div className="container-fluid">
        <Link className="navbar-brand" to="/home-admin">
          Admin
        </Link>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="navbarText">
          <ul className="navbar-nav me-auto mb-2 mb-lg-0">
             

            <li className="nav-item">
              <Link className="nav-link" to="/admin-predmeti">
                Predmeti
              </Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link" to="/admin-odeljenja">
                Odeljenja
              </Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link" to="/admin-profesori">
                Profesori
              </Link>
            </li>

            
            <li className="nav-item">
              <Link className="nav-link" to="/admin-ucenici">
                Učenici
              </Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link" to="/admin-ocene">
                Ocene
              </Link>
            </li>

          </ul>
          <span className="navbar-text">
   
             <Link className="btn btn-link" to="/pocetna" onClick={handleLogoutAdmin} style={{ color: "#0066b2" }}>
              Logout
            </Link>
      
             
          </span>
        </div>
      </div>
    </nav>
  );
};

export default NavBarAdmin;

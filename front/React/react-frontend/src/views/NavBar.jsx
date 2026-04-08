import React from "react";
import axios from "axios";
import { Link } from "react-router-dom";


const NavBar = ({ token }) => {

  const auth_token = window.sessionStorage.getItem("auth_token");
  const roditelj_id = window.sessionStorage.getItem("roditelj_id");

  function handleLogoutUcenik() {
    let config = {
      method: "post",
      url: "http://127.0.0.1:8000/api/logout-ucenik",
      headers: {
        Authorization: "Bearer " + auth_token,
      },
    };

    axios
      .request(config)
      .then((response) => {
        console.log(JSON.stringify(response.data));
        window.sessionStorage.removeItem("auth_token");
       // window.sessionStorage.removeItem("ucenik_id");
      })
      .catch((error) => {
        console.log(error);
      });

  }

  function handleLogoutRoditelj() {
    let config = {
      method: "post",
      url: "http://127.0.0.1:8000/api/logout-roditelj",
      headers: {
        Authorization: "Bearer " + auth_token,
      },
    };

    axios
      .request(config)
      .then((response) => {
        console.log(JSON.stringify(response.data));
        window.sessionStorage.removeItem("auth_token");
       // window.sessionStorage.removeItem("ucenik_id");
      })
      .catch((error) => {
        console.log(error);
      });

  }

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div className="container-fluid">
      {roditelj_id==null && ( <Link className="navbar-brand" to="/home-ucenik">
          eDnevnik
        </Link>
       )}
       {roditelj_id!=null && ( <Link className="navbar-brand" to="/home-roditelj">
          eDnevnik
        </Link>
       )}
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

            {roditelj_id==null && (
              
              <li className="nav-item">
              <Link className="nav-link active" to="/home-ucenik">
                Početna
              </Link>
            </li>
             )}

              {roditelj_id!=null && (
              
              <li className="nav-item">
              <Link className="nav-link active" to="/home-roditelj">
                Početna
              </Link>
            </li>
             )}

            <li className="nav-item">
              <Link className="nav-link" to="/predmeti-ucenik">
                Predmeti
              </Link>
            </li>

            <li className="nav-item">
              <Link className="nav-link" to="/saradnja">
                Saradnja
              </Link>
            </li>

          </ul>
          <span className="navbar-text">
          {roditelj_id==null && (
             <Link className="btn btn-link" to="/pocetna" onClick={handleLogoutUcenik} style={{ color: "#0066b2" }}>
              Logout
            </Link>
             )}
              {roditelj_id!=null && (
             <Link className="btn btn-link" to="/pocetna" onClick={handleLogoutRoditelj} style={{ color: "#0066b2" }}>
              Logout
            </Link>
             )}
          </span>
        </div>
      </div>
    </nav>
  );
};

export default NavBar;

import React from 'react'
import NavBarAdmin from './NavBarAdmin'
import { Link, useNavigate } from 'react-router-dom';

function HomeAdministrator() {

  const token = window.sessionStorage.getItem("auth_token");
  const admin = window.sessionStorage.getItem("admin_id");
  const id = parseInt(admin, 10);

  const navigate = useNavigate();

  const ime = window.sessionStorage.getItem("admin_ime");
  const prezime = window.sessionStorage.getItem("admin_prezime");
  const imeprezime = ime+" "+prezime;

  const email = window.sessionStorage.getItem("admin_email");
  const username = window.sessionStorage.getItem("admin_username");

  if (token === null || admin==null) {
    return (
      <div
        style={{
          display: "flex",
          flexDirection: "column",
          alignItems: "center",
          justifyContent: "center",
          height: "100vh",
        }}
      >
        <h5>Vratite se na login stranicu i pokušajte ponovo.</h5>
        <button
          type="button"
          className="btn btn-primary"
          data-mdb-ripple-init
          style={{ marginTop: "16px" }} 
          onClick={() => navigate("/pocetna")}
        >
          Login stranica
        </button>
      </div>
    );
  }

  return (
    <div>
       < NavBarAdmin />

      <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center", gap: '15px', marginTop:"20px" }}>
        <div className="card" style={{ width: 25 + "rem"}}>
        <div className="card-header" style={{ fontSize: '24px' }}>Admin panel</div>
        <div className="card-body">
          <h5 className="card-title">{imeprezime}</h5>
          <p className="card-text">{email}</p>
          <p className="card-text" style={{textAlign:"right"}}>username: {username}</p>
        </div>
        </div>
      </div>

      <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center", alignItems:"center", gap: '40px', marginTop:"70px", marginLeft:"19%", marginRight:"19%", marginBottom:"150px" }}>


      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/admin-ucenici" style={{ color: 'navy', fontSize: '24px' }}>Učenici</Link>
        <div className="card-body">
          <p className="card-text">pregled i manipulacija nad učenicima u bazi</p>
        </div>
      </div>

      
      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/admin-predmeti" style={{ color: 'navy', fontSize: '24px' }}>Predmeti</Link>
        <div className="card-body">
          <p className="card-text">pregled predmeta na sve četiri godine</p>
        </div>
      </div>

      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/admin-profesori" style={{ color: 'navy', fontSize: '24px' }}>Profesori</Link>
        <div className="card-body">
          <p className="card-text">pregled svih profesora iz baze</p>
        </div>
      </div>

      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/admin-odeljenja" style={{ color: 'navy', fontSize: '24px' }}>Odeljenja</Link>
        <div className="card-body">
          <p className="card-text">pregled svih odeljenja iz baze</p>
        </div>
      </div>

      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/admin-ocene" style={{ color: 'navy', fontSize: '24px' }}>Ocene</Link>
        <div className="card-body">
          <p className="card-text">pregled i manipulacija nad ocenama u bazi</p>
        </div>
      </div>

      <div className="card" style={{ width: 18 + "rem" }}>
        <Link className="nav-link card-header" to="/admin-registracija-ucenika" style={{ color: 'navy', fontSize: '24px' }}>Registracija</Link>
        <div className="card-body">
          <p className="card-text">registracija i dodavanje novoupisanog učenika u bazu</p>
        </div>
      </div>

        </div>


    </div>
  )
}
/*
<div className="card" style={{ width: 18 + "rem" }}>
<Link className="nav-link card-header" to="/home-admin" style={{ color: 'navy', fontSize: '24px' }}>Ocene</Link>
<div className="card-body">
  <p className="card-text">pregled svih ocena iz baze</p>
</div>
</div> */

export default HomeAdministrator

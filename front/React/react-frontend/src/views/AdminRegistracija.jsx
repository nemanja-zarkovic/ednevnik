import React from 'react'
import NavBarAdmin from './NavBarAdmin'
import { Link, useNavigate } from 'react-router-dom';

function AdminRegistracija() {

    const token = window.sessionStorage.getItem("auth_token");
    const admin = window.sessionStorage.getItem("admin_id");
    const id = parseInt(admin, 10);
  
    const navigate = useNavigate();
  
    const ime = window.sessionStorage.getItem("admin_ime");
    const prezime = window.sessionStorage.getItem("admin_prezime");
    const imeprezime = ime+" "+prezime;
  
    const email = window.sessionStorage.getItem("admin_email");
    const username = window.sessionStorage.getItem("admin_username");

  return (
    <div>
    < NavBarAdmin />

   <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center", gap: '15px', marginTop:"20px" }}>
     <div className="card" style={{ width: 25 + "rem"}}>
     <div className="card-header" style={{ fontSize: '24px' }}>Registracija novog korisnika</div>
     <div className="card-body">
       <h5 className="card-title">{imeprezime}</h5>
       <p className="card-text">{email}</p>
       <p className="card-text" style={{textAlign:"right"}}>username: {username}</p>
     </div>
     </div>
   </div>

   <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center", alignItems:"center", gap: '40px', marginTop:"70px", marginLeft:"19%", marginRight:"19%", marginBottom:"150px" }}>

   <div className="card" style={{ width: 18 + "rem" }}>
     <Link className="nav-link card-header" to="/admin-registracija-ucenika" style={{ color: 'navy', fontSize: '24px' }}>Učenik</Link>
     <div className="card-body">
       <p className="card-text">registracija i dodavanje novog učenika u bazu</p>
     </div>
   </div>

   <div className="card" style={{ width: 18 + "rem" }}>
     <Link className="nav-link card-header" to="/admin-ocene" style={{ color: 'navy', fontSize: '24px' }}>Roditelj</Link>
     <div className="card-body">
       <p className="card-text">registracija i dodavanje novog roditelja u bazu</p>
     </div>
   </div>

   <div className="card" style={{ width: 18 + "rem" }}>
     <Link className="nav-link card-header" to="/admin-ocene" style={{ color: 'navy', fontSize: '24px' }}>Profesor</Link>
     <div className="card-body">
       <p className="card-text">registracija i dodavanje novog profesora u bazu</p>
     </div>
   </div>

     </div>


 </div>
  )
}

export default AdminRegistracija

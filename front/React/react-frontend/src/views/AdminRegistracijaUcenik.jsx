import React, { useState } from 'react';
import axios from 'axios';
import NavBarAdmin from './NavBarAdmin';
import { useNavigate } from 'react-router-dom';

function AdminRegistracijaUcenik() {
  const [userData, setUserData] = useState({
    username: "",
    password: "",
    email: "",
    ime: "",
    prezime: "",
    odeljenjeId: "",
  });

  const navigate = useNavigate();

  const token = window.sessionStorage.getItem("auth_token");
  const admin = window.sessionStorage.getItem("admin_id");
  const id = parseInt(admin, 10);

  const [registerError, setRegisterError] = useState(false);
  const [registerMessage, setRegisterMessage] = useState("");

  function handleInput(e) {
    setUserData({ ...userData, [e.target.name]: e.target.value });
  }

  function handleRegister(e) {
    e.preventDefault();
    axios
      .post("http://127.0.0.1:8000/api/registracija-ucenika", userData, {
        headers: {
          Authorization: "Bearer " + token,
        },
      }).then((response) => {
        console.log(response.data);
        if (response.data.message === 'success') {
          setRegisterMessage("Uspešno ste registrovali novog učenika.");
        } 
      })
      .catch((error) => {
        setRegisterError(true);
        setRegisterMessage("Došlo je do greške prilikom registracije: " + error.message +". Username i email adresa moraju biti jedinstveni.");
      });
  }

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
    <NavBarAdmin/>
    <div className="container" style={{width:"30%"}}>
      <h2 className="my-4">Registracija novog učenika</h2>
      <form onSubmit={handleRegister}>
        <div className="mb-3">
          <label htmlFor="username" className="form-label">Korisničko ime:</label>
          <input type="text" className="form-control" id="username" name="username" value={userData.username} onChange={handleInput} required  />
        </div>
        <div className="mb-3">
          <label htmlFor="password" className="form-label">Lozinka:</label>
          <input type="password" className="form-control" id="password" name="password" value={userData.password} onChange={handleInput} required  />
        </div>
        <div className="mb-3">
          <label htmlFor="email" className="form-label">Email:</label>
          <input type="email" className="form-control" id="email" name="email" value={userData.email} onChange={handleInput} required />
        </div>
        <div className="mb-3">
          <label htmlFor="ime" className="form-label">Ime:</label>
          <input type="text" className="form-control" id="ime" name="ime" value={userData.ime} onChange={handleInput} required />
        </div>
        <div className="mb-3">
          <label htmlFor="prezime" className="form-label">Prezime:</label>
          <input type="text" className="form-control" id="prezime" name="prezime" value={userData.prezime} onChange={handleInput} required />
        </div>
        <div className="mb-3">
          <label htmlFor="odeljenjeId" className="form-label">ID odeljenja:</label>
          <input type="text" className="form-control" id="odeljenjeId" name="odeljenjeId" value={userData.odeljenjeId} onChange={handleInput} placeholder="ID mozete naci u kartici Odeljenja" required />
        </div>
        <button type="submit" className="btn btn-primary">Registruj učenika</button>
      </form>
      {registerError && <div className="alert alert-danger mt-3">{registerMessage}</div>}
      {!registerError && registerMessage && <div className="alert alert-success mt-3">{registerMessage}</div>}
    </div>
    </div>
  );
}

export default AdminRegistracijaUcenik;
